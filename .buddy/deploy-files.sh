#!/usr/bin/env bash

# Sourced by the Buddy SSH script after it sets app, cache and site.
deployment_enabled_maintenance=false

start_deployment_maintenance() {
  if wp maintenance-mode is-active --path="$site" --skip-plugins --skip-themes; then
    echo 'Leaving the existing maintenance mode under operator control.'
    return 0
  fi

  wp maintenance-mode activate --path="$site" --skip-plugins --skip-themes
  deployment_enabled_maintenance=true
  trap 'cleanup_deployment_on_exit "$?"' EXIT
}

finish_deployment_maintenance() {
  if [ "$deployment_enabled_maintenance" = true ]; then
    wp maintenance-mode deactivate --path="$site" --skip-plugins --skip-themes || return
    deployment_enabled_maintenance=false
  fi
}

cleanup_deployment_on_exit() {
  local exit_status="$1"
  if ! finish_deployment_maintenance; then
    echo 'Could not turn off deployment maintenance mode.' >&2
    if [ "$exit_status" -eq 0 ]; then
      exit_status=1
    fi
  fi
  exit "$exit_status"
}

activate_deployed_plugins() {
  # Older WP-CLI passes null for --network on single-site activation. The AI
  # plugin's activation listener requires a bool, so omit it from this CLI run.
  wp plugin activate --skip-plugins=ai "$@"
}

copy_wordpress_core() {
  tar -C "$core" --exclude='./wp-content' -cf - . | tar -C "$site" -xf -
}

# Prepare a complete replacement privately before moving the current path aside.
replace_deployed_path() {
  local source="$1" destination="$2" work
  work=$(mktemp -d "$cache/replace.XXXXXX")
  cp -a "$source" "$work/new"
  if [ -e "$destination" ] || [ -L "$destination" ]; then
    mv "$destination" "$work/old"
  fi
  if ! mv "$work/new" "$destination"; then
    rm -rf "$destination"
    if [ -e "$work/old" ] || [ -L "$work/old" ]; then
      mv "$work/old" "$destination"
    fi
    echo "Could not replace $destination; deployment stopped." >&2
    return 1
  fi
  rm -rf "$work"
}

deploy_site_code() {
  local source destination name
  mkdir -p "$site/wp-content/themes" "$site/wp-content/mu-plugins" "$site/wp-content/plugins"
  replace_deployed_path "$app/wp-content/themes/one-base-theme" "$site/wp-content/themes/one-base-theme"

  # Only one-* directories and one-*.php files belong to this repository.
  for source in "$app/wp-content/mu-plugins"/one-*; do
    if [ -d "$source" ] || { [[ "$source" == *.php ]] && [ -f "$source" ]; }; then
      name="${source##*/}"
      replace_deployed_path "$source" "$site/wp-content/mu-plugins/$name"
    fi
  done
  for destination in "$site/wp-content/mu-plugins"/one-*; do
    if [ -d "$destination" ] || { [[ "$destination" == *.php ]] && [ -f "$destination" ]; }; then
      name="${destination##*/}"
      if [ ! -e "$app/wp-content/mu-plugins/$name" ] && [ ! -L "$app/wp-content/mu-plugins/$name" ]; then
        rm -rf "$destination"
      fi
    fi
  done

  for name in "${plugins[@]}"; do
    replace_deployed_path "$app/wp-content/plugins/$name" "$site/wp-content/plugins/$name"
  done
  replace_deployed_path "$app/vendor" "$site/vendor"
  cp "$app/composer.json" "$app/composer.lock" "$site/"
}
