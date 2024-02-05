// Criar categoria
let btn_abrir_criar_categoria = document.querySelector('.btn-abrir-criar-categoria');
let btn_fechar_criar_categoria = document.querySelector('.btn-fechar-criar-categoria');
let content_criar_categoria = document.querySelector('.content-criar-categoria');

btn_abrir_criar_categoria.addEventListener('click', () => {
  content_criar_categoria.style.display = 'flex';
});

btn_fechar_criar_categoria.addEventListener('click', () => {
  content_criar_categoria.style.display = 'none';
});

// Editar categoria
function editar(id) {
  let btn_fechar_editar_categoria = document.querySelector('.btn-fechar-editar-categoria');
  let btn_editar_categoria = document.querySelector('.btn-editar-categoria');
  let content_editar_categoria = document.querySelector('.content-editar-categoria');
  let parent_id = document.querySelector(`#parent-id-${id}`).value;
  let nome = document.querySelector(`#nome-${id}`).value;

  btn_fechar_editar_categoria.addEventListener('click', () => {
    content_editar_categoria.style.display = 'none';
  });

  content_editar_categoria.style.display = 'flex';

  document.querySelector(`#editar-id-categoria`).innerHTML = `ID da Categoria: ${id}`;
  document.querySelector(`#editar-parent-id-categoria`).value = parent_id;
  document.querySelector(`#editar-nome-categoria`).value = nome;
}

// Apagar Categoria
function apagar(endpoint) {
  let btn_apagar_sim = document.querySelector('#btn-apagar-sim');
  let btn_apagar_nao = document.querySelector('#btn-apagar-nao');
  let content_apagar_categoria = document.querySelector('.content-apagar-categoria');

  content_apagar_categoria.style.display = 'flex';

  btn_apagar_nao.addEventListener('click', ()=>{
    content_apagar_categoria.style.display = 'none';
  });

  btn_apagar_sim.addEventListener('click', ()=>{
    window.location = endpoint;
  });
}