//Ejecutando funciones
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

//Declarando variables
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

    //FUNCIONES

function anchoPage(){

    if (window.innerWidth > 850){
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "block";
    }else{
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";   
    }
}

anchoPage();


    function iniciarSesion(){
        if (window.innerWidth > 850){
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "10px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.opacity = "1";
            caja_trasera_login.style.opacity = "0";
        }else{
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.display = "block";
            caja_trasera_login.style.display = "none";
        }
    }

    function register(){
        if (window.innerWidth > 850){
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "410px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.opacity = "0";
            caja_trasera_login.style.opacity = "1";
        }else{
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.display = "none";
            caja_trasera_login.style.display = "block";
            caja_trasera_login.style.opacity = "1";
        }
}

Swal.fire({
        width: '',
        title: 'Términos y Condiciones.',
        html: '<style> .texto{text-align: justify; line-height: 25px; color:#000000;} .texto1{text-align: justify; line-height: 25px; color:#2C2C2C;} </style> <p class="texto">Ayuda a mantener los comentarios en un ambiente sano.</p><p class="texto1">Siempre comentar con relación al contenido que se trata.</p><p class="texto">Respetar cada opinion o comentario de cada usuario.<p class="texto1">Toda sección de comentarios está bajo revisión en caso de insultos o palabras indebidas.</p><p class="texto">Permitir el acceso a GAFIA toda información que se le solicite.</p><p class="texto1">Toda informacion privada será almacenado solo por fines hacia nuestro blog y no se expondrán al público.</p><p class="texto">Al aceptar los términos, usted está aceptando almacenar sus datos personales. </p>',
        confirmButtonText: 'Acepto',
        background: '#bdbdbd',
        backdrop: 'true',
        position: 'center',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: false,
        confirmButtonColor: '#48C341',
    });