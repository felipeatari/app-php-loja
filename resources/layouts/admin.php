<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

  <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= $layout_css ?>">
  <link rel="stylesheet" href="<?= $view_css ?>">
  <title><?= $layout_title ?></title>
</head>
<body>
  <div class="container">
    <!-- Carrega o conteúdo dinâmico -->
    <div class="coluna-esquerda">
        <nav class="menu-admin">
          <div class="coluna-esquerda-titulo">
            <a href="<?= URL ?>"><img class="logo-admin" src="/resources/assets/images/logo3.png" alt=""></a>
            <p>Dashboard</p>
          </div>
          <ul class="menu-admin-bg">
            <li class="menu-admin-logo"><a href="<?= URL ?>/admin"><svg class="logo-home-admin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.<path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg></a></li>
            <li class="menu-admin-titulo">
              <p class="menu-admin-bg-titulo">Produtos</p>

              <ul class="menu-admin-items">
                <a href="<?= URL ?>/admin/produto/listar"><li class="menu-admin-bg-selecionar-item">Listar</li></a>
                <a href="<?= URL ?>/admin/produto/cadastrar"><li class="menu-admin-bg-selecionar-item">Cadastrar</li></a>
                <a href="<?= URL ?>/admin/produto/categorias"><li class="menu-admin-bg-selecionar-item">Categorias</li></a>
              </ul>
            </li>
            <li class="menu-admin-titulo">
              <p class="menu-admin-bg-titulo">Sku</p>
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
      <div class="coluna-direita">
        <?= $content ?>
      </div>
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