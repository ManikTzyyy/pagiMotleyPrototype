let heroIndex = 1; // Mulai dari gambar tengah
const images = document.querySelectorAll("#hero .img-hero");

function changeImage() {
  // Hapus kelas active dari gambar saat ini
  images[heroIndex].classList.remove("active");

  // Hitung indeks gambar berikutnya
  heroIndex = (heroIndex + 1) % images.length;

  // Tambahkan kelas active ke gambar berikutnya
  images[heroIndex].classList.add("active");
}

// Inisialisasi gambar tengah sebagai aktif
images[heroIndex].classList.add("active");

// Panggil fungsi setiap 3 detik
setInterval(changeImage, 3000);
