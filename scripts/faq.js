// Ambil semua accordion item
var acc = document.getElementsByClassName("accordion-item");

// Tambahkan event listener untuk setiap accordion item
for (var i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        // Toggle antara menampilkan dan menyembunyikan panel
        this.classList.toggle("active");

        var panel = this.nextElementSibling;

        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
