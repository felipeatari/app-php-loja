<div class="admin-produto-categoria">
  <div class="content-categoria">

    <?php if (isset($message)) { ?>
      <div class="message-<?= $type_message ?>">
        <p><?= $message ?></p>
      </div>
    <?php } ?>

    <h1>Categoria dos Produtos</h1>
    <button class="btn-criar-categoria">Criar Categoria</button>
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
          <td><a href="<?= URL . '/admin/produto/categorias?action=editar&id=' . $categoria->id ?>">editar</a></td>
          <td><a href="<?= URL . '/admin/produto/categorias?action=apagar&id=' . $categoria->id ?>">apagar</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="content-criar-categoria">
    <form action="<?= URL . '/admin/produto/categorias?action=criar' ?>" method="post">
      <div class="fechar-criar-categoria">
        <span>X</span>
      </div>
      <div class="criar-categoria-inputs">
        <label for="criar-parent-id-categoria" class="criar-parent-id-categoria">
          Parent ID: <input type="text" name="parent_id" id="criar-parent-id-categoria" value="<?= $_POST['parent_id'] ?? '' ?>">
        </label>
        <label for="criar-nome-categoria" class="criar-nome-categoria">
          Nome: <input type="text" name="nome" id="criar-nome-categoria" value="<?= $_POST['nome'] ?? '' ?>">
        </label>
        <button type="submit">Criar</button>
      </div>
    </form>
  </div>
</div>
<style>
  .admin-produto-categoria {
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .btn-criar-categoria {
    margin-top: 40px;
    margin-bottom: 10px;
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
    margin: auto auto;
    background-color: rgba(10, 23, 55, 0.5);
    <?php if (false) { ?>
      display: flex;
    <?php } else { ?>
        display: none;
    <?php } ?>
    align-items: center;
    justify-content: center;
  }

  .content-criar-categoria form {
    width: 500px;
    background-color: white;
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
</style>
<script>
  let btn_criar_categoria = document.querySelector('.btn-criar-categoria');
  let content_criar_categoria = document.querySelector('.content-criar-categoria');
  let fechar_criar_categoria = document.querySelector('.fechar-criar-categoria');

  btn_criar_categoria.addEventListener('click', () => {
    content_criar_categoria.style.display = 'flex';
  });

  fechar_criar_categoria.addEventListener('click', () => {
    content_criar_categoria.style.display = 'none';
  });
</script>