<div class="admin-produto-categoria">
  <div class="content-categoria">

    <?php if (isset($message)) { ?>
      <div class="message-<?= $type_message ?>">
        <p><?= $message ?></p>
      </div>
    <?php } ?>

    <h1>Categoria dos Produtos</h1>
    <button class="btn-abrir-criar-categoria">Criar Categoria</button>
    <table border="1" width="1000">
      <thead>
        <tr>
          <th>ID</th>
          <th>Parente ID</th>
          <th>Nome</th>
          <th>Editar</th>
          <th>Apagar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categorias as $categoria): ?>
        <tr>
          <td id="teste-td"><?= $categoria->id ?></td>
          <td><?= $categoria->parent_id ?></td>
          <td><?= $categoria->nome ?></td>
          <td><button value="<?= $categoria->parent_id ?>" id="parent-id-<?= $categoria->id ?>" class="btn-editar" onclick="editar(<?= $categoria->id ?>)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg></button></td>
          <td><button value="<?= $categoria->nome ?>" id="nome-<?= $categoria->id ?>" class="btn-apagar" onclick="apagar(<?= '\'' . URL . '/admin/produto/categorias?action=apagar&id=' . $categoria->id . '\'' ?>)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.<path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Criar categoria -->
  <div class="content-criar-categoria">
    <form action="<?= URL . '/admin/produto/categorias?action=criar' ?>" method="post" id="form-categorias">
      <div class="fechar-criar-categoria">
        <span class="btn-fechar-criar-categoria">X</span>
      </div>
      <div class="criar-categoria-inputs">
        <label for="criar-parent-id-categoria" class="criar-parent-id-categoria">
          Parent ID: <input type="text" name="parent_id" value="">
        </label>
        <label for="criar-nome-categoria" class="criar-nome-categoria">
          Nome: <input type="text" name="nome" value="">
        </label>
        <button type="submit" id="btn-criar-categoria" class="btn-salvar">Salvar</button>
      </div>
    </form>
  </div>
  <!-- Criar categoria -->

  <!-- Editar categoria -->
  <div class="content-editar-categoria">
    <form action="<?= URL . '/admin/produto/categorias?action=editar' ?>" method="post" id="form-categorias">
      <div class="fechar-editar-categoria">
        <span class="btn-fechar-editar-categoria">X</span>
      </div>
      <div class="editar-categoria-inputs">
        <label for="">
          ID: <input type="text" name="id" id="editar-id-categoria" style="color: darkgray;" value="" readonly>
        </label>
        <label for="editar-parent-id-categoria" class="editar-parent-id-categoria">
          Parent ID: <input type="text" name="parent_id" id="editar-parent-id-categoria" value="">
        </label>
        <label for="editar-nome-categoria" class="editar-nome-categoria">
          Nome: <input type="text" name="nome" id="editar-nome-categoria" value="">
        </label>
        <button type="submit" id="btn-editar-categoria" style="margin-top: 20px;" class="btn-salvar">Salvar</button>
      </div>
    </form>
  </div>
  <!-- Editar categoria -->

  <div class="content-apagar-categoria">
    <div class="apagar-categoria">
      <h1>Tem certeza que deseja apagar essa categoria?</h1>
      <div class="buttons-apagar">
        <button class="btns-apagar" id="btn-apagar-nao">Não</button>
        <button class="btns-apagar" id="btn-apagar-sim">Sim</button>
      </div>
    </div>
  </div>

</div>
<style>
  .admin-produto-categoria {
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow: scroll;
    background-color: #F8F8F8;
  }

  .btn-abrir-criar-categoria {
    margin-top: 40px;
    margin-bottom: 10px;
    /* padding: 4px; */
    color: white;
    border: none;
    border-radius: 2px;
    font-weight: bold;
    background-color: #1D85F4;
    width: 150px;
    height: 40px;
  }

  .btn-salvar {
    color: white;
    border: none;
    border-radius: 2px;
    font-weight: bold;
    background-color: #1D85F4;
    width: 50px;
    height: 30px;
  }

  .btn-apagar a {
    color: black;
  }
  .btn-apagar {
    width: 60px;
    height: 30px;
    padding: 3px;
    fill:white;
    border: none;
    border-radius: 2px;
    background-color: #DB1210;
  }
  .btn-apagar svg {
    height: 17px;
  }

  .btn-editar {
    width: 60px;
    height: 30px;
    padding: 3px;
    fill:white;
    border: none;
    border-radius: 2px;
    background-color: #1D85F4;
  }
  .btn-editar svg {
    height: 17px;
  }

  .content-categoria {
    margin-top: 40px;
  }

  .content-categoria h1 {
    font-size: 15pt;
    color: #19263f;
  }

  table {
    border-collapse: collapse;
    font-size: 10pt;
  }
  th {
    height: 60px;
    background-color: #19263f;
    color: white;
  }
  td, th {
    text-align: center;
    padding: 8px;
    border: 1px solid #ddd;
  }

  .verificar-apagar {
    width: 100%;
    height: 100vh;
    position: absolute;
    display: flex;
    justify-content: center;
  }

  .content-apagar-categoria {
    width: 100%;
    height: 100vh;
    position: absolute;
    display: none;
    justify-content: center;
  }
  .apagar-categoria {
    margin-top: 20px;
    width: 400px;
    height: 170px;
    background-color: white;
    box-shadow: 2px 2px 10px #888888;
  }
  .apagar-categoria h1 {
    margin-top: 20px;
    margin-bottom: 30px;
    text-align: center;
    font-size: 12pt;
    color: #19263f;
  }
  .buttons-apagar {
    width: 100%;
    padding: 20px;
    display: flex;
    justify-content: space-evenly;
  }
  .btns-apagar {
    width: 60px;
    height: 30px;
    padding: 3px;
    fill:white;
    border: none;
    border-radius: 2px;
    background-color: #1D85F4;
    color: white;
  }

  .content-criar-categoria {
    width: 100%;
    height: 100vh;
    position: absolute;
    display: none;
    justify-content: center;
  }

  .content-criar-categoria form {
    margin-top: 20px;
    width: 500px;
    height: 300px;
    background-color: white;
    box-shadow: 2px 2px 10px #888888;
  }

  .criar-categoria-inputs {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 500px;
    height: 240px;
    padding-bottom: 20px;
  }
  .criar-categoria-inputs input {
    width: 200px;
    height: 35px;
    padding: 5px;
    border: 0.5px solid #ccc;
    border-radius: 1px;
  }

  .criar-categoria-inputs label {
    margin-top: 20px;
    margin-bottom: 20px;
  }

  .fechar-criar-categoria {
    width: 100%;
    padding: 10px;
  }
  .fechar-criar-categoria span {
    padding: 5px;
    cursor: pointer;
  }

  .content-editar-categoria {
    width: 100%;
    height: 100vh;
    position: absolute;
    display: none;
    justify-content: center;
  }

  .content-editar-categoria form {
    margin-top: 20px;
    width: 500px;
    height: 350px;
    background-color: white;
    box-shadow: 2px 2px 10px #888888;
  }

  .editar-categoria-inputs {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 500px;
    height: 300px;
    padding-bottom: 20px;
  }

  .editar-categoria-inputs label {
    margin-top: 20px;
    margin-bottom: 20px;
  }
  .editar-categoria-inputs input {
    width: 200px;
    height: 35px;
    padding: 5px;
    border: 0.5px solid #ccc;
    border-radius: 1px;
  }

  .fechar-editar-categoria {
    width: 100%;
    padding: 10px;
  }
  .fechar-editar-categoria span {
    padding: 5px;
    cursor: pointer;
  }
</style>
<script>
  let btn_abrir_criar_categoria = document.querySelector('.btn-abrir-criar-categoria');

  let content_criar_categoria = document.querySelector('.content-criar-categoria');
  let btn_fechar_criar_categoria = document.querySelector('.btn-fechar-criar-categoria');

  btn_abrir_criar_categoria.addEventListener('click', () => {
    content_criar_categoria.style.display = 'flex';
  });

  btn_fechar_criar_categoria.addEventListener('click', () => {
    content_criar_categoria.style.display = 'none';
  });

  let content_editar_categoria = document.querySelector('.content-editar-categoria');
  let btn_fechar_editar_categoria = document.querySelector('.btn-fechar-editar-categoria');

  btn_fechar_editar_categoria.addEventListener('click', () => {
    content_editar_categoria.style.display = 'none';
  });

  function editar(id) {
    let parent_id = document.querySelector(`#parent-id-${id}`).value;
    let nome = document.querySelector(`#nome-${id}`).value;

    content_editar_categoria.style.display = 'flex';

    document.querySelector(`#editar-id-categoria`).value = id;
    document.querySelector(`#editar-parent-id-categoria`).value = parent_id;
    document.querySelector(`#editar-nome-categoria`).value = nome;
  };

  function apagar(endpoint) {
    let btn_apagar_sim = document.querySelector('#btn-apagar-sim');
    let btn_apagar_nao = document.querySelector('#btn-apagar-nao');
    let content_apagar_categoria = document.querySelector('.content-apagar-categoria');

    content_apagar_categoria.style.display = 'flex';

    btn_apagar_nao.addEventListener('click', ()=>{
      content_apagar_categoria.style.display = 'none';
    });

    btn_apagar_sim.addEventListener('click', ()=>{
      window.location = endpoint
    });
  };

</script>