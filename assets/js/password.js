var eye = document.getElementById("eye");
var contrasena = document.getElementById("contrasena");

eye.addEventListener("click", function(){
    if(contrasena.type == "password"){
        contrasena.type = "text";
        eye.style.opacity = 0.8;
    }else{
        contrasena.type = "password";
        eye.style.opacity = 0.2;
    }

})