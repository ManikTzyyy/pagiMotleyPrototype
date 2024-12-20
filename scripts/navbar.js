document.addEventListener("DOMContentLoaded", () => {
    // Scroll Event Listener untuk navbar
    window.addEventListener('scroll', () => {
      const navbar = document.getElementById('navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  
    // Intersection Observer untuk menandai link aktif di navbar
    const sections = document.querySelectorAll("section"); // Semua section dengan ID
    const navLinks = document.querySelectorAll(".nav-list a"); // Semua link navbar
  
    const options = {
      root: null, // Menggunakan viewport sebagai root
      threshold: 0.9, // Bagian terlihat setidaknya 90%
    };
  
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // Hapus class 'active' dari semua link
          navLinks.forEach((link) => link.classList.remove("active"));
  
          // Tambahkan class 'active' ke link yang sesuai
          const activeLink = document.querySelector(
            `.nav-list a[href="#${entry.target.id}"]`
          );
          if (activeLink) {
            activeLink.classList.add("active");
          }
        }
      });
    }, options);
  
    // Observasi semua section
    sections.forEach((section) => observer.observe(section));
  
    // Toggle menu visibility dan ikon pada menu
    const menuToggle = document.getElementById('menuToggle');
    const navList = document.getElementById('navList');
    const menuIcon = document.getElementById('menuIcon');
  
    menuToggle.addEventListener('click', () => {
      navList.classList.toggle('active'); // Menampilkan / menyembunyikan nav-list
      menuIcon.classList.toggle('fa-angle-down');
      menuIcon.classList.toggle('fa-angle-up');
      // menuIcon.classList.toggle('fa-angle-up'); // Mengubah ikon menjadi silang
    });
  });
  