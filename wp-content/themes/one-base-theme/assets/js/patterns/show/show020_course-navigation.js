// wp-content/themes/one-base-theme/src/scripts/patterns/show/show020_course-navigation.js
for (const navigation of document.querySelectorAll(".one-202x-pattern-show020_course-navigation")) {
  const links = [...navigation.querySelectorAll('a[href^="#"]')];
  const sections = links.map((link) => document.getElementById(link.hash.slice(1)));
  let pending = false;
  const update = () => {
    pending = false;
    let current = sections.findIndex(Boolean);
    sections.forEach((section, index) => {
      if (section && section.getBoundingClientRect().top <= window.innerHeight * 0.3) current = index;
    });
    links.forEach((link, index) => {
      if (index === current) link.setAttribute("aria-current", "location");
      else link.removeAttribute("aria-current");
    });
  };
  const schedule = () => {
    if (!pending) {
      pending = true;
      requestAnimationFrame(update);
    }
  };
  window.addEventListener("scroll", schedule, { passive: true });
  window.addEventListener("resize", schedule);
  update();
}
