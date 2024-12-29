let currentIndex = 0;
const images = document.querySelectorAll('.fade-img');
const totalImages = images.length;

function changeImage() {
  images[currentIndex].classList.remove('active');
  currentIndex = (currentIndex + 1) % totalImages;
  images[currentIndex].classList.add('active');
}

setInterval(changeImage, 4000); // Ganti gambar setiap 3 detik
