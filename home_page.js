// Buttons
const addProductBtn = document.getElementById("addProductBtn");
const closeModal = document.getElementById("closeModal");

// Modal
const productModal = document.getElementById("productModal");

// Open Modal
addProductBtn.addEventListener("click", function () {
    productModal.style.display = "flex";
});

// Close Modal
closeModal.addEventListener("click", function () {
    productModal.style.display = "none";
});

// Close Modal when clicking outside
window.addEventListener("click", function (e) {
    if (e.target === productModal) {
        productModal.style.display = "none";
    }
});