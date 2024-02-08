<div class="admin-produto-cadastrar">
  <form action="<?= URL . '/admin/produto/salvar' ?>" method="post">
    <br><br>
    <h1>Cadastrar Produto</h1><br><br>
    <div class="inputs1">
      Categoria:
      <select name="<?= $categoria->id ?>" id="">
        <?php foreach ($categorias as $categoria) : ?>
          <option value="<?= $categoria->id ?>"><?= $categoria->nome ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="inputs1">Nome: <input type="text" name="nome" id=""></div>
    <div class="inputs1">Descrição: <input type="text" name="descricao" id=""></div>
    <div class="inputs1">Preço: <input type="text" name="preco" id=""></div>
    <div class="inputs1">Peso: <input type="text" name="peso" id=""></div>
    <div class="inputs1">Foto: <input type="file" name="foto" id=""></div>
    <div class="inputs1">Foto URL: <input type="text" name="foto_url" id=""></div>
    <br><button type="submit">salvar</button>
  </form>
</div>
<style>
  .admin-produto-cadastrar {
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .inputs1 {
    display: flex;
    flex-direction: column;
    margin: 5px;
  }

  /* View */
.admin-produto-produto {
  width: 100%;
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  overflow: scroll;
  background-color: #F8F8F8;
}

  form {
    display: flex;
    flex-direction: column;
    width: 300px;
    height: 200px;
    align-items: center;
    justify-content: space-between;
  }

  input {
    width: 300px;
    height: 25px;
  }

  select {
    width: 300px;
    height: 25px;
  }
</style>