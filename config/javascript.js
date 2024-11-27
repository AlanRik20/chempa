// validaar que solo ingrese letras
function sololetras(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚäëïöüÿÄËÏÖÜŸ"
    especiales = "8-10-13-37-38-46-164";
    teclado_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true; break;
        }
    }
    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
        {
            return false;
        }
    }
}
// validar que solo ingrese numeros
function solonumeros(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    letras = " 1234567890"
    especiales = "8-13-37-38-46-164";
    teclado_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true; break;
        }
    }
    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
        {
            return false;
        }
    }
}

    //validar letras y numeros
    function validaambos(e) {
        key = e.keyCode || e.which;
        teclado = String.fromCharCode(key);
        letras = " 1234567890abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚäëïöüÿÄËÏÖÜŸ"
        especiales = "8-10-13-37-38-46-164";
        teclado_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial = true; break;
            }
        }
        if (letras.indexOf(teclado) == -1 && !teclado_especial) {
            {
                return false;
            }
        }
    }
//validar telefono completo
function ValidarTelefono(fono) {
    //if (fono.value.lenght < 8) {
    if (fono.value.length < 8) {
        alert("Escriba su número completo");
        fono.focus();
        fono.select();
    }
}


// barra lateral deslizar
// const btnToggle = document.querySelector('.toggle-btn');

// btnToggle.addEventListener('click', function () {
//     document.getElementById('sidebar').classList.toggle('active');
// });

// const botonLateral = document.querySelector('.toggle-btn');

// botonLateral.addEventListener('click', function () {
//     document.getElementById('boton-lateral').classList.toggle('activo');
// })


// menu desplegable
var menu = document.querySelectorAll('.opcion');
menu.forEach(function (item) {
    item.addEventListener('click', function (i) {
        var elemento = i.target.parentNode;
        console.log(elemento.children);
        elemento.children[1].classList.toggle('activo');
    });
});


var menu2 = document.querySelectorAll('.opcion-bar');
menu2.forEach(function (item) {
    item.addEventListener('click', function (i) {
        var elemento = i.target.parentNode;
        console.log(elemento.children);
        elemento.children[1].classList.toggle('activo');
    });
});


//confirmar eliminar registro
function confirmacion(e) {
    if (confirm("¿Esté seguro que desea eliminar este registro?")) {
        return true;
    } else {
        e.preventDefault();
    }
};
let linkDelete = document.querySelectorAll(".item-categoria-link-delete");
for (var i = 0; i < linkDelete.length; i++) {
    linkDelete[i].addEventListener('click', confirmacion);
};

//
//
//

//confirmar cerrar sesion
function confirmarCerrar(e) {
    if (confirm("¿Esté seguro que desea cerrar sesion?")) {
        return true;
    } else {
        e.preventDefault();
    }
};
let cerrarSesion = document.querySelectorAll(".cerrar_sesion");
for (var i = 0; i < cerrarSesion.length; i++) {
    cerrarSesion[i].addEventListener('click', confirmarCerrar);
};