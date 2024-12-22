function filterFAQs() {
  const searchInput = document.getElementById("faqSearch").value.toLowerCase();
  const faqSections = document.querySelectorAll(".accordion-item");

  faqSections.forEach((item) => {
    const header = item
      .querySelector(".accordion-header")
      .textContent.toLowerCase();
    const content = item
      .querySelector(".accordion-content")
      .textContent.toLowerCase();

    // Show item if it matches search input, otherwise hide it
    if (header.includes(searchInput) || content.includes(searchInput)) {
      item.style.display = "";
    } else {
      item.style.display = "none";
    }
  });
}
