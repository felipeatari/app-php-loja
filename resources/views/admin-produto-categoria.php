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
          <td><?= $categoria->id ?></td>
          <td><?= $categoria->parent_id ?></td>
          <td><?= $categoria->nome ?></td>
          <td><button class="btn-editar" onclick="pegarID(<?= $categoria->id ?>)">editar</button></td>
          <td><button class="btn-apagar"><a href="<?= URL . '/admin/produto/categorias?action=apagar&id=' . $categoria->id ?>">apagar</a></button></td>
          <input type="hidden" name="parent_id" id="parent-id-<?= $categoria->id ?>" value="<?= $categoria->parent_id ?>">
          <input type="hidden" name="nome" id="nome-<?= $categoria->id ?>" value="<?= $categoria->nome ?>">
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Criar categoria -->
  <div class="content-criar-categoria">
    <form action="<?= URL . '/admin/produto/categorias?action=criar' ?>" method="post" id="form-categorias">
      <div class="fechar-criar-categoria">
        <span>X</span>
      </div>
      <div class="criar-categoria-inputs">
        <label for="criar-parent-id-categoria" class="criar-parent-id-categoria">
          Parent ID: <input type="text" name="parent_id" value="">
        </label>
        <label for="criar-nome-categoria" class="criar-nome-categoria">
          Nome: <input type="text" name="nome" value="">
        </label>
        <button type="submit" id="btn-criar-categoria">Salvar</button>
      </div>
    </form>
  </div>
  <!-- Criar categoria -->

  <!-- Editar categoria -->
  <div class="content-editar-categoria">
    <form action="<?= URL . '/admin/produto/categorias?action=editar' ?>" method="post" id="form-categorias">
      <div class="fechar-editar-categoria">
        <span>X</span>
      </div>
      <div class="editar-categoria-inputs">
          <h4 id="mostrar-id-categoria"></h4><br><br>
          <input type="hidden" name="id" id="editar-id-categoria" value="">
        <label for="editar-parent-id-categoria" class="editar-parent-id-categoria">
          Parent ID: <input type="text" name="parent_id" id="editar-parent-id-categoria" value="">
        </label>
        <label for="editar-nome-categoria" class="editar-nome-categoria">
          Nome: <input type="text" name="nome" id="editar-nome-categoria" value="">
        </label>
        <button type="submit" id="btn-editar-categoria">Salvar</button>
      </div>
    </form>
  </div>
  <!-- Editar categoria -->

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
    padding: 3px;
  }

  .btn-apagar a {
    color: black;
  }
  .btn-apagar {
    padding: 3px;
  }
  .btn-editar {
    padding: 3px;
  }

  .content-categoria {
    margin-top: 40px;
  }

  table {
    border-collapse: collapse;
    font-size: 10pt;
  }

  h1 {
    font-size: 15pt;
  }

  td,
  th {
    text-align: center;
    padding: 8px;
    border: 1px solid #ddd;
  }

  .content-criar-categoria {
    width: 100%;
    height: 100vh;
    position: absolute;
    display: none;
    justify-content: center;
  }

  .content-criar-categoria form {
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
    height: 300px;
    padding-bottom: 20px;
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
    width: 500px;
    height: 300px;
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
  let fechar_criar_categoria = document.querySelector('.fechar-criar-categoria');

  btn_abrir_criar_categoria.addEventListener('click', () => {
    content_criar_categoria.style.display = 'flex';
  });

  fechar_criar_categoria.addEventListener('click', () => {
    content_criar_categoria.style.display = 'none';
  });

  let content_editar_categoria = document.querySelector('.content-editar-categoria');
  let fechar_editar_categoria = document.querySelector('.fechar-editar-categoria');

  fechar_editar_categoria.addEventListener('click', () => {
    content_editar_categoria.style.display = 'none';
  });

  function pegarID(id) {
    let mostrar_id_categoria = document.querySelector(`#mostrar-id-categoria`);

    let parent_id = document.querySelector(`#parent-id-${id}`).value;
    let nome = document.querySelector(`#nome-${id}`).value;

    content_editar_categoria.style.display = 'flex';

    mostrar_id_categoria.innerHTML = `ID da Categoria: ${id}`;

    document.querySelector(`#editar-id-categoria`).value = id;
    document.querySelector(`#editar-parent-id-categoria`).value = parent_id;
    document.querySelector(`#editar-nome-categoria`).value = nome;
  };
</script>