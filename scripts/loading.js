// script.js
window.addEventListener("load", function () {
  const loadingScreen = document.getElementById("loading-screen");
  const mainContent = document.getElementById("main-content");

  // Tambahkan delay untuk loading screen agar logo bisa fade
  setTimeout(() => {
    loadingScreen.style.opacity = "0"; // Mengurangi opacity untuk efek fade-out
    setTimeout(() => {
      loadingScreen.style.display = "none"; // Sembunyikan loading screen setelah fade-out
      mainContent.style.display = "block"; // Tampilkan konten utama
    }, 1000); // Waktu untuk animasi fade-out loading screen
  }, 2000); // Delay sebelum mulai fade-out loading screen
});
