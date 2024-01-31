<h1>Tela para Listar o Produto</h1>

<br>
<?php
foreach ($produtos as $produto):
  pr('id:' . $produto->id);
  pr('nome:' . $produto->nome);
  pr('<br><hr><br>');
endforeach;
?>