<div class="admin-produto-cadastrar">
  <form action="<?= URL . '/admin/produto/salvar' ?>" method="post">
    <br><br><h1>Dados do Produto</h1><br><br>
    <div class="inputs1">Nome: <input type="text" name="nome" id=""></div>
    <div class="inputs1">Descrição: <input type="text" name="descricao" id=""></div>
    <div class="inputs1">Preço: <input type="text" name="preco" id=""></div>
    <div class="inputs1">Peso: <input type="text" name="peso" id=""></div>
    <div class="inputs1">
      Categoria:
      <select name="" id="">
      <option value="">Camiseta</option>
      <option value="">Camisa</option>
      <option value="">Short</option>
      <option value="">Bermuda</option>
      <option value="">Calça</option>
    </select>
    </div>
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