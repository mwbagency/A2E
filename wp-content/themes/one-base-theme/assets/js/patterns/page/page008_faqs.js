// wp-content/themes/one-base-theme/src/scripts/patterns/page/page008_faqs.js
document.querySelectorAll(".one-202x-pattern-page008_faqs").forEach((page) => {
  const form = page.querySelector(".a2e-faqs-page__search");
  const input = form?.querySelector('input[type="search"]');
  const status = page.querySelector(".a2e-faqs-page__status");
  if (!input || !status || form.dataset.faqSearchReady) {
    return;
  }
  form.dataset.faqSearchReady = "true";
  const normalise = (text) => text.normalize("NFKD").replace(/\p{M}/gu, "").toLocaleLowerCase();
  const groups = Array.from(page.querySelectorAll(".a2e-faqs-page__category"), (section) => ({
    section,
    items: Array.from(section.querySelectorAll(".one-faqs-faqs__item"), (element) => ({
      element,
      text: normalise(element.textContent)
    }))
  }));
  function filterAnswers() {
    const words = normalise(input.value.trim()).split(/\s+/).filter(Boolean);
    let count = 0;
    groups.forEach(({ section, items }) => {
      let matches = 0;
      items.forEach(({ element, text }) => {
        const visible = words.every((word) => text.includes(word));
        element.hidden = !visible;
        if (!visible) {
          element.open = false;
        }
        if (visible) {
          matches++;
        }
      });
      section.hidden = words.length > 0 && matches === 0;
      count += matches;
    });
    const empty = words.length > 0 && count === 0;
    status.classList.toggle("screen-reader-text", !empty);
    status.textContent = words.length === 0 ? "" : empty ? status.dataset.emptyLabel : status.dataset.resultsLabel.replace("%d", String(count));
  }
  input.addEventListener("input", filterAnswers);
  form.addEventListener("submit", (event) => {
    event.preventDefault();
    filterAnswers();
  });
});
