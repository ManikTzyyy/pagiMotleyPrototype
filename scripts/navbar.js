document.addEventListener("DOMContentLoaded", () => {
  // Scroll Event Listener untuk navbar
  window.addEventListener("scroll", () => {
    const navbar = document.getElementById("navbar");
    if (window.scrollY > 50) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }
  });

  // Toggle menu visibility dan ikon pada menu
  const menuToggle = document.getElementById("menuToggle");
  const navList = document.getElementById("navList");
  const menuIcon = document.getElementById("menuIcon");

  menuToggle.addEventListener("click", () => {
    navList.classList.toggle("active"); // Menampilkan / menyembunyikan nav-list
    menuIcon.classList.toggle("fa-angle-down");
    menuIcon.classList.toggle("fa-angle-up");
    // menuIcon.classList.toggle('fa-angle-up'); // Mengubah ikon menjadi silang
  });
});
