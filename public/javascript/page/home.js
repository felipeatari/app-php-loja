/* Teste */
let item = document.querySelector('.slider-item');

let inicia_slide = 1;
let limite_slides = 3;

item.src = `${url}/storage/theme/banner-${inicia_slide}.jpg`;

function voltar() {
  inicia_slide--;

  if (inicia_slide < 1) {
    inicia_slide = limite_slides;
  }

  item.src = `${url}/storage/theme/banner-${inicia_slide}.jpg`;
}
function avancar() {
  inicia_slide++;

  if (inicia_slide > limite_slides) {
    inicia_slide = 1;
  }

  item.src = `${url}/storage/theme/banner-${inicia_slide}.jpg`;
}

setInterval(avancar, 5000);