document.addEventListener("DOMContentLoaded", function () {
    const btn1 = document.getElementById("toggleBtn1");
    const btn2 = document.getElementById("toggleBtn2");
    const btn3 = document.getElementById("toggleBtn3");
    const btn4 = document.getElementById("toggleBtn4");

    const contenido1 = document.getElementById("contenido1");
    const contenido2 = document.getElementById("contenido2");
    const contenido3 = document.getElementById("contenido3");
    const contenido4 = document.getElementById("contenido4");

    // Función auxiliar para ocultar todos los contenidos
    function ocultarTodos() {
        contenido1.style.display = "none";
        contenido2.style.display = "none";
        contenido3.style.display = "none";
        contenido4.style.display = "none";
    }

    btn1.addEventListener("click", function () {
        if (contenido1.style.display === "none" || contenido1.style.display === "") {
            ocultarTodos();
            contenido1.style.display = "block";
        } else {
            contenido1.style.display = "none";
        }
    });

    btn2.addEventListener("click", function () {
        if (contenido2.style.display === "none" || contenido2.style.display === "") {
            ocultarTodos();
            contenido2.style.display = "block";
        } else {
            contenido2.style.display = "none";
        }
    });

    btn3.addEventListener("click", function () {
        if (contenido3.style.display === "none" || contenido3.style.display === "") {
            ocultarTodos();
            contenido3.style.display = "block";
        } else {
            contenido3.style.display = "none";
        }
    });

    btn4.addEventListener("click", function () {
        if (contenido4.style.display === "none" || contenido4.style.display === "") {
            ocultarTodos();
            contenido4.style.display = "block";
        } else {
            contenido4.style.display = "none";
        }
    });
});
