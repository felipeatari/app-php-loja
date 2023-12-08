let item = document.querySelector('.slider-item');

let inicia_slide = 1;
let limite_slides = 3;

item.src = `storage/theme/banner-${inicia_slide}.jpg`;

function voltar() {
  inicia_slide--;

  if (inicia_slide < 1) {
    inicia_slide = limite_slides;
  }

  item.src = `storage/theme/banner-${inicia_slide}.jpg`;
}

function avancar() {
  inicia_slide++;

  if (inicia_slide > limite_slides) {
    inicia_slide = 1;
  }

  item.src = `storage/theme/banner-${inicia_slide}.jpg`;
}

setInterval(avancar, 5000);

function entrar(img) {
  img.style.width = 'auto'
  img.style.height = '350px'
}

function sair(img) {
  img.style.height = 'auto'
  img.style.width = '300px'
}