const lapaz_image = 'https://media.tacdn.com/media/attractions-splice-spp-674x446/06/6f/46/31.jpg';
const beni_image = 'https://www.radiofides.com/es/wp-content/uploads/2020/06/Municipio-de-Magdalena-Imagen-de-referencia-Foto-Internet.jpg';

const lapaz_button = document.querySelector('#lapaz_button');
const beni_button = document.querySelector('#beni_button');
const registro_button = document.querySelector('#registro');

const image = document.querySelector('#image');
const contenido = document.querySelector('#contenido');

const titulo = document.querySelector('.titulo');

const formulario = document.querySelector('#formulario');
const imagen_contenido = document.querySelector('#imagen-contenido');

let contenido_lp = `
<h2>La Paz </h2> Es uno de los nueve departamentos que forman el Estado Plurinacional de Bolivia. Su capital es Nuestra Señora de La Paz, sede del Gobierno Central y del Poder Legislativo, que se encuentra a una altitud de 3640 m, y su ciudad más poblada, El Alto.

Está ubicado al oeste del país, limitanto al norte con Pando, al este con Beni y Cochabamba, al sur con Oruro, al suroeste con Chile y al oeste con Perú y el lago Titicaca. Con 133 985 km² es el tercer departamento más extenso —por detrás de Santa Cruz y Beni—, con 2 706 351 habitantes en 2012, es el más poblado y con 20,2 hab/km², el segundo más densamente poblado, por detrás de Cochabamba.

El departamento fue creado a partir de la Intendencia de La Paz de la Real Audiencia de Charcas, mediante Decreto Supremo de 23 de enero de 1826.
`;

let contenido_beni = `
<h2>Beni</h2> Es uno de los nueve departamentos que conforman el Estado Plurinacional de Bolivia. Su capital es Trinidad. Está ubicado en el centronorte del país, limitando al norte con Brasil, al este con el departamento de Santa Cruz, al sur con el departamento de Cochabamba, al oeste con el departamento de La Paz y al noroeste con el departamento de Pando. Con una superficie territorial de 213.564 km², Beni es el segundo departamento más extenso de Bolivia.
`;


lapaz_button.addEventListener('mouseenter', e => {
    image.src = lapaz_image;
    image.classList.add('active');
    titulo.classList.add('inactive');
    titulo.classList.remove('active');
    contenido.innerHTML = contenido_lp;
    cambiarVentana();
    
});

beni_button.addEventListener('mouseenter', e => {
    image.src = beni_image;
    image.classList.add('active');
    titulo.classList.add('inactive');
    titulo.classList.remove('active');
    contenido.innerHTML = contenido_beni;
    cambiarVentana();
});

registro_button.addEventListener('mouseenter', e => {
    formulario.classList.add('active');
    imagen_contenido.classList.add('inactive');
    imagen_contenido.classList.remove('active');
    
});






[beni_button, lapaz_button].forEach(element => {
    element.addEventListener('mouseleave', e => {
        image.src = '';
        image.classList.remove('active');
        titulo.classList.add('active');
        titulo.classList.remove('inactive');
        contenido.innerHTML = '<h1>Contenido</h1>';
        
    })
})

function cambiarVentana() {
    formulario.classList.add('inactive')
    formulario.classList.remove('active');

    imagen_contenido.classList.add('active')
    imagen_contenido.classList.remove('inactive')
}