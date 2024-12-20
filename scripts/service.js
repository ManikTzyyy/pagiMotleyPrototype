// Service Data
const services = {
  1: {
    title: "Custom Design & Personalization",
    content: "Experience fashion made just for you. Customize designs, colors, and patterns inspired by nature and crafted with traditional techniques.",
    img: "../assets/pagimotley/img/drawing.webp",
    icon: "fa-pen",
  },
  2: {
    title: "Natural Dyeing & Eco-Friendly Fashion",
    content: "We specialize in eco-conscious clothing created with natural dyes from plants and herbs, ensuring sustainable beauty and timeless elegance.",
    img: "../assets/pagimotley/img/fashion.webp",
    icon: "fa-leaf",
  },
  3: {
    title: "Artisanal Craftsmanship",
    content: "Each piece is carefully handcrafted by skilled artisans, reflecting cultural heritage and unmatched attention to detail.",
    img: "../assets/pagimotley/img/production2.webp",
    icon: "fa-hand-sparkles",
  },
  4: {
    title: "Limited Edition Collections",
    content: "Explore exclusive, limited-edition collections that celebrate art, culture, and modern design in every stitch.",
    img: "../assets/pagimotley/img/product1.webp",
    icon: "fa-gem",
  },
  5: {
    title: " Cultural Workshops & Experiences",
    content: "Join us for hands-on workshops where you can learn traditional dyeing and crafting techniques while connecting with local artisans.",
    img: "../assets/pagimotley/img/production4.webp",
    icon: "fa-palette",
  },
};

// DOM Elements
const serviceContainer = document.getElementById("serviceContainer");
const containerContent = document.querySelector(".container-content");
const serviceImage = document.querySelector("#service-image");

// Generate Services
function generateServices() {
  Object.entries(services).forEach(([point, service]) => {
    const serviceElement = document.createElement("div");
    serviceElement.className = "list-service row";
    serviceElement.setAttribute("data-point", point);

    serviceElement.innerHTML = `
      <div class="list-img">
        <i class="fa-solid ${service.icon}"></i>
      </div>
      <h5>${service.title}</h5>
    `;

    serviceContainer.appendChild(serviceElement);
  });

  // Click Event Handler
  const serviceItems = document.querySelectorAll(".list-service");
  serviceItems.forEach((item) => {
    item.addEventListener("click", () => {
      const point = item.dataset.point;

      // Remove active class
      serviceItems.forEach((service) =>
        service.classList.remove("active")
      );

      // Add active class
      item.classList.add("active");

      // Update content
      containerContent.innerHTML = `
        
        <p>${services[point].content}</p>
      `;

      // Update image
      serviceImage.src = services[point].img;
    });
  });
}

// Call the Function
generateServices();
