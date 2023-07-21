document.getElementById("btn_register").addEventListener("click", register);
document.getElementById("btn_login").addEventListener("click", login);
window.addEventListener("resize", anchoPagina);

//Variables
var container_login_register = document.querySelector(".container_login-register");
var formulario_login = document.querySelector(".formulario_login");
var formulario_register = document.querySelector(".formulario_register");
var box1_login = document.querySelector(".box1-login");
var box1_register = document.querySelector(".box1-register");


function anchoPagina() {
    if (window.innerWidth > 850) {
        box1_login.style.display = "block";
        box1_register.style.display = "block";
    } else {
        box1_register.style.display = "block";
        box1_register.style.opacity = "1";
        box1_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_register.style.display = "none";
        container_login_register.style.left = "0px";
    }
}

anchoPagina();

function login() {
    if (window.innerWidth > 850) {
        formulario_login.style.display = "block";
        container_login_register.style.left = "10px";
        formulario_register.style.display = "none";
        box1_register.style.opacity = "1";
        box1_login.style.opacity = "0";
    } else {
        formulario_login.style.display = "block";
        container_login_register.style.left = "0px";
        formulario_register.style.display = "none";
        box1_register.style.display = "block";
        box1_login.style.display = "none";
    }
}

function register() {
    if (window.innerWidth > 850) {
        formulario_register.style.display = "block";
        container_login_register.style.left = "410px";
        formulario_login.style.display = "none";
        box1_register.style.opacity = "0";
        box1_login.style.opacity = "1";
    } else {
        formulario_register.style.display = "block";
        container_login_register.style.left = "0px";
        formulario_login.style.display = "none";
        box1_register.style.display = "none";
        box1_login.style.display = "block";
        box1_login.style.opacity = "1";
    }
}

