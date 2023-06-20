const password = document.getElementById("password");
const password_confirm = document.getElementById("password_confirm");
const btnShowPassword = document.getElementById("btnShowPassword");
const btnPassword = document.querySelector("#btnPassword");
const btnShowPasswordIcon = document.querySelector("#btnShowPassword i");
const btnShowPasswordIcons = document.querySelector("#btnPassword i");

btnShowPassword.addEventListener("click", (e) => {
    e.preventDefault();
    if (password.getAttribute("type") == "password") {
        password.setAttribute("type", "text");
        btnShowPasswordIcon.classList.toggle("fa fa-eye");
        btnShowPasswordIcon.classList.toggle("fa fa-eye-slash");
    } else {
        password.setAttribute("type", "password");
        btnShowPassword.classList.toggle("fa fa-eye-slash");
        btnShowPasswordIcon.classList.toggle("fa fa-eye");
    }
});

btnPassword.addEventListener("click", (e) => {
    e.preventDefault();
    if (password_confirm.getAttribute("type") == "password") {
        password_confirm.setAttribute("type", "text");
        btnPassword.classList.toggle("fa fa-eye");
        btnPassword.classList.toggle("fa fa-eye-slash");
    } else {
        password_confirm.setAttribute("type", "password");
        btnShowPasswordIcons.classList.toggle("fa fa-eye");
        btnShowPasswordIcons.classList.toggle("fa fa-eye-slash");
    }
});
