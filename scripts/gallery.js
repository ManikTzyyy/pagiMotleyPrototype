// Daftar Gambar
const imageSources = [
    "../assets/pagimotley/img/female-model3.webp",
    "../assets/pagimotley/img/female-model8.webp",
    "../assets/pagimotley/img/female-model3.webp",
    "../assets/pagimotley/img/female-model8.webp",
    "../assets/pagimotley/img/female-model3.webp",
    "../assets/pagimotley/img/female-model8.webp",
    "../assets/pagimotley/img/female-model3.webp",
    "../assets/pagimotley/img/female-model8.webp",
    "../assets/pagimotley/img/female-model3.webp",
    "../assets/pagimotley/img/female-model8.webp",
    "../assets/pagimotley/img/female-model3.webp",
    "../assets/pagimotley/img/female-model8.webp",

  ];
  
  // Elemen Target
  const contentWrapper = document.getElementById("contentWrapper");
  
  // Fungsi untuk Mengenerate Gambar
  function generateImages() {
    imageSources.forEach((src) => {
      // Buat Elemen Gambar
      const cardImg = document.createElement("div");
      cardImg.className = "card-img";
  
      const img = document.createElement("img");
      img.src = src;
      img.alt = "Generated Image";
  
      // Tambahkan ke Wrapper
      cardImg.appendChild(img);
      contentWrapper.appendChild(cardImg);
    });
  }
  
  // Panggil Fungsi
  generateImages();
  