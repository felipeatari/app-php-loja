<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="<?= $layout_css ?>">
  <title><?= $layout_title ?></title>
</head>
<body>
  <div class="container">
    <header>
      <h3>Dashboard</h3>
    </header>
    <!-- Carrega o conteúdo dinâmico -->
    <section class="content-dinamic">
      <div class="coluna coluna-esquerda">
        <!-- <div class="titulo-opcoes">
          <h3>Opções do Admin</h3>
        </div> -->
        <nav class="menu-admin">
          <ul class="menu-admin-bg">
            <li class="menu-admin-titulo">
              <h1>Produtos</h1>
              <ul class="menu-admin-items">
                <a href="<?= URL ?>/admin/produto/listar"><li class="menu-admin-bg-selecionar-item">Listar</li></a>
                <a href="<?= URL ?>/admin/produto/cadastrar"><li class="menu-admin-bg-selecionar-item">Cadastrar</li></a>
                <a href="<?= URL ?>/admin/produto/categorias"><li class="menu-admin-bg-selecionar-item">Categorias</li></a>
              </ul>
            </li>
          </ul>
        </nav>
        <div class="footer">
          <p>Luky Store Oficial</p>
          <p>© Todos os direitos reservados</p><br>
          <p style="font-size: 7pt;">CNPJ: 12.345.678/0001-10</p>
        </div>
      </div>
      <div class="coluna coluna-direita">
        <?= $content ?>
      </div>
    </section>
    <!-- Carrega todo o JavaScript do site -->
    <script src="<?= $layout_js ?>"></script>
    <!-- <footer class="rodape">
      <p>Luky Store Oficial © Todos os direitos reservados <br><br>
        CNPJ: 12.345.678/0001-10
      </p>
    </footer> -->
  </div>
</body>
</html>