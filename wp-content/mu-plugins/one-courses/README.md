# Courses and programme filters

Courses remain the `course` post type. The programme listing uses the native Query Loop and the existing Programme content card.

Insert **A2E → Programmes — filtered course grid** on a normal page. Its banner, category tabs, sidebar and results are inside one Query Loop. Keep those blocks together when rearranging the page; a nested Query Loop is a separate query with separate filters. Additional Post Templates in the same query share the selection.

Select any **Query Filters** block to choose categories, tags, another taxonomy, a public custom field, or sorting. Custom field options use `stored value|label`, one per line, and match exact values. Only scalar REST-exposed fields and ACF fields enabled for bindings are offered. The Query Loop's **Visitor filters** panel chooses AND or OR across filters; multiple options within one filter always use OR. Existing query constraints still apply.

Courses have four additional taxonomies, selectable in the editor sidebar:

- Difficulty: Basic, Intermediate, Advanced.
- Validation (years): NA, 1 to 2, 2 to 4, 4+.
- Duration (hours): 0-8, 8-16, 16-24, 24+.
- Price: £50 - £100, £100 - £150, £150 - £200, £200+.

The exact certification-validity, duration and price text remains in Course details for card and hero display. Difficulty comes from the taxonomy. Select the appropriate bands independently; changing display text does not silently reassign terms. Range upper boundaries are inclusive (e.g. 4 years belongs to 2 to 4; £200 belongs to £150 - £200). Blank values are not assumed to mean NA, and day-based durations need a confirmed teaching-hour count.

The initial terms and unambiguous existing assignments were created once locally using:

```sh
docker compose run --rm --no-deps wpcli eval-file scripts/setup-course-filters.php
```

This script does not run on activation, deployment or page requests. The transferred database contains the terms and selections. It preserves existing assignments if explicitly run again.

Sorting currently offers newest/oldest and name A–Z/Z–A. There is no booking/popularity data yet. **Query Results — load more and count** uses the existing Icon Button, so its label, optional icon and icon position remain editable. It shows the current total and expands the list by the Query Loop's page size. Filters reset that count; browser history and direct links restore the selection. Loading is limited to 100 batches per query; larger listings ask visitors to refine their filters.

The regression check creates temporary records within a database transaction and rolls them back:

```sh
docker compose run --rm --no-deps wpcli eval-file scripts/test-query-filters.php
```
