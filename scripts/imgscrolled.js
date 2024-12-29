// Array sumber gambar
const imgSources = [
  "assets/pagimotley/img/guiding.webp",
  "assets/pagimotley/img/production4.webp",
  "assets/pagimotley/img/nature.webp",
  "assets/pagimotley/img/product8.webp",
  "assets/pagimotley/img/production5.webp",
];

// Referensi ke elemen about-img
const aboutImgContainer = document.querySelector(".about-img");

// Fungsi untuk membuat elemen gambar
function generateImages(sources) {
  sources.forEach((src, index) => {
    const img = document.createElement("img");
    img.src = src;
    img.alt = "";
    img.className = "fade-img";

    // Tambahkan atribut loading="lazy" untuk lazy loading
    img.loading = "lazy";

    // Tambahkan kelas 'active' ke gambar pertama
    if (index === 0) {
      img.classList.add("active");
    }

    aboutImgContainer.appendChild(img);
  });
}

// Panggil fungsi untuk membuat gambar
generateImages(imgSources);
