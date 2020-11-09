let caja_amarilla = document.querySelector('#caja-amarilla');
let label_info = document.querySelector('#label-info');
let checkbox = document.querySelector('#check');
console.log(label_info)

let boton1 = document.querySelector('#boton1')
let boton2 = document.querySelector('#boton2')
let boton3 = document.querySelector('#boton3')


checkbox.addEventListener('change', e => {
    if (checkbox.checked == true) {


        label_info.innerHTML = "encendido";
        caja_amarilla.style.display = "none";
        label_info.style.color = "blue";

        cambiarColorText(boton1, 'black', 'red', 'prender');
        cambiarColorText(boton3, 'black', 'red', 'encender');


    } else if (checkbox.checked == false) {

        console.log('cambiando 2');
        caja_amarilla.style.display = "block";
        label_info.style.color = "red";

        cambiarColorText(boton1, 'black', 'red', 'encender');
        cambiarColorText(boton3, 'black', 'red', 'encender');
    }

});

function cambiarColorText(element, color1, color2, texto) {
    // boton1.style.color = 'red';
    // boton1.style.background = 'black';

    element.style.color = color1;
    element.style.background = color2;
    element.innerHTML = texto;

}