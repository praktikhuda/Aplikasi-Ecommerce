document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("password");
    const showPasswordCheckbox = document.getElementById("formCheck");

    showPasswordCheckbox.addEventListener("change", function() {
        if (showPasswordCheckbox.checked) {
            // Jika checkbox dicentang, ubah tipe input ke "text" untuk menampilkan password
            passwordInput.type = "text";
        } else {
            // Jika checkbox tidak dicentang, kembalikan tipe input ke "password"
            passwordInput.type = "password";
        }
    });
});