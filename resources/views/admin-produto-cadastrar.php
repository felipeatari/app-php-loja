<h1>Tela para Cadastrar o Produto</h1>
<form action="<?= URL . '/admin/produto/salvar' ?>" method="post">
  Nome: <input type="text" name="nome" id="">
  Descrição: <input type="text" name="descricao" id="">
  <input type="submit" value="salvar-produto">
</form>