let produto_img_destaque = document.querySelector('.produto-img-destaque');

if (document.querySelector('.produto-img-1')) {
  produto_img_destaque.src = document.querySelector('.produto-img-1').src;

  function mudar(info) {
    produto_img_destaque.src = info.src;
  }

  produto_img_destaque.style.width = '300px'
}
