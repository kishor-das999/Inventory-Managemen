const togglePassword = document.getElementById("togglePassword");
const password = document.getElementById("password");

if (togglePassword) {
    togglePassword.addEventListener("click", function () {

        if (password.type === "password") {
            password.type = "text";
            this.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            password.type = "password";
            this.classList.replace("fa-eye-slash", "fa-eye");
        }

    });
}
