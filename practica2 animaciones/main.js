const center_point = document.querySelector('.center-point');
const divs = document.querySelectorAll('.div');

divs.forEach(div => {
    div.addEventListener('mouseenter', e => {
        reunir_bolitas();
    })
})

center_point.addEventListener('mouseenter', e => {
    reunir_bolitas();
})

center_point.addEventListener('mouseleave', e => {
    separarBolitas();
})

function reunir_bolitas() {
    document.querySelector('.div1').classList.add('active');
    document.querySelector('.div2').classList.add('active');
    document.querySelector('.div3').classList.add('active');
    document.querySelector('.div4').classList.add('active');
}

function separarBolitas() {
    document.querySelector('.div1').classList.remove('active');
    document.querySelector('.div2').classList.remove('active');
    document.querySelector('.div3').classList.remove('active');
    document.querySelector('.div4').classList.remove('active');
}