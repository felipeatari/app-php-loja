<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="<?= $layout_css ?>">
  <link rel="stylesheet" href="<?= $view_css ?>">
  <title><?= $layout_title ?></title>
</head>
<body>
  <div class="container">
    <header>
      <div class="bloco-header-desktop">
        <div class="topo">
          <!-- Logo -->
          <a href="<?= URL ?>"><img width="150px" src="/public/assets/images/logo.png" alt=""></a>
          <!-- Social e Rastreio -->
          <div class="social-e-rastreio">
            <svg class="social-icones social-icones-facebook" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" /></svg>
            <svg class="social-icones social-icones-instagram" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" /></svg>
            <div class="rastrear">
              <input type="search" name="rastrear" class="rastrear-campo" placeholder="Rastrear encomenda...">
              <svg id="rastrear-btn" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" /></svg>
            </div>
          </div>
          <!-- Conta e Carrinho -->
          <div class="conta-e-carrinho">
            <div class="conta">
              <a href="<?= URL ?>/login"><svg class="conta-icone" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.<path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" /></svg></a>
            </div>
            <div class="carrinho">
              <a href="<?= URL ?>/carrinho"><svg class="carrinho-icone" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" /></svg></a>
              <p class="carrinho-qnt-produtos" id="qnt-produtos">0</p>
            </div>
          </div>
        </div>
        <!-- Menu Desktop -->
        <nav class="menu-desktop">
          <ul class="items-menu-desktop">
            <li><a class="item-menu-desktop item-princiapl-menu-desktop" href="<?= HOME ?>">Home</a></li>
            <li class="abrir-opcoes"><a class="item-menu-desktop item-princiapl-menu-desktop" href="#">Camisetas</a>
              <ul class="opcoes-abertas">
                <li class="item-submenu-desktop-border-bottom"><a class="item-submenu-desktop" href="<?= URL ?>/produtos?cat=camiseta&tipo=t-shirt">T-Shirt</a></li>
                <li class="item-submenu-desktop-border-bottom"><a class="item-submenu-desktop" href="<?= URL ?>/produtos?cat=camisa&tipo=long-line">Long Line</a></li>
                <li><a class="item-submenu-desktop" href="<?= URL ?>/produtos?cat=camiseta&tipo=oversize">Oversize</a></li>
              </ul>
            </li>
            <li class="abrir-opcoes"><a class="item-menu-desktop item-princiapl-menu-desktop" href="#">Shorts</a>
              <ul class="opcoes-abertas">
                <li class="item-submenu-desktop-border-bottom"><a class="item-submenu-desktop" href="<?= URL ?>/produtos?cat=short&tipo=mauricinho">Mauricinho</a></li>
                <li class="item-submenu-desktop-border-bottom"><a class="item-submenu-desktop" href="<?= URL ?>/produtos?cat=short&tipo=basico">basico</a></li>
                <li><a class="item-submenu-desktop" href="<?= URL ?>/produtos?cat=short&tipo=jeans">Jeans</a></li>
              </ul>
            </li>
            <li><a class="item-menu-desktop item-princiapl-menu-desktop" href="#">Calças</a></li>
            <li><a class="item-menu-desktop item-princiapl-menu-desktop" href="#">Calçados</a></li>
          </ul>
        </nav>
      </div>
      <div class="bloco-header-mobile">
        <!-- Logo -->
        <a href="<?= URL ?>" class="logo-mobile"><img src="/public/assets/images/logo.png" alt=""></a>
        <div class="topo">
          <i id="btn-open" class="btn-open fas fa-bars"></i>
          <svg class="social-icones social-icones-facebook" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" /></svg>
          <svg class="social-icones social-icones-instagram" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" /></svg>
            <div class="conta">
              <a href="<?= URL ?>/login"><svg class="conta-icone" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.<path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" /></svg></a>
            </div>
            <div class="carrinho">
              <a href="<?= URL ?>/carrinho"><svg class="carrinho-icone" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" /></svg></a>
              <p class="carrinho-qnt-produtos" id="qnt-produtos">0</p>
            </div>
        </div>
        <!-- Rastreio -->
        <div class="rastrear">
          <input type="search" name="rastrear" class="rastrear-campo" placeholder="Rastrear encomenda...">
          <svg id="rastrear-btn" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" /></svg>
        </div>
        <!-- Menu Mobile -->
        <nav class="menu-mobile">
          <ul class="items-menu-mobile">
            <p id="btn-close" class="btn-close">X</p>
            <li><a class="item-menu-mobile item-princiapl-menu-mobile" href="<?= HOME ?>">Home</a></li>
            <li class="abrir-opcoes"><a class="item-menu-mobile item-princiapl-menu-mobile" href="#">Camisetas</a>
              <ul class="opcoes-abertas">
                <li class="item-submenu-mobile-border-bottom"><a class="item-submenu-mobile" href="<?= URL ?>/produtos/camiseta/t-shirt">T-Shirt</a></li>
                <li class="item-submenu-mobile-border-bottom"><a class="item-submenu-mobile" href="<?= URL ?>/produtos/camiseta/long-line">Long Line</a></li>
                <li><a class="item-submenu-mobile" href="<?= URL ?>/produtos/camiseta/oversize">Oversize</a></li>
              </ul>
            </li>
            <li class="abrir-opcoes"><a class="item-menu-mobile item-princiapl-menu-mobile" href="#">Shorts</a>
              <ul class="opcoes-abertas">
                <li class="item-submenu-mobile-border-bottom"><a class="item-submenu-mobile" href="<?= URL ?>/produtos/short/mauricinho">Mauricinho</a></li>
                <li class="item-submenu-mobile-border-bottom"><a class="item-submenu-mobile" href="<?= URL ?>/produtos/short/basico">basico</a></li>
                <li><a class="item-submenu-mobile" href="<?= URL ?>/produtos/short/jeans">Jeans</a></li>
              </ul>
            </li>
            <li><a class="item-menu-mobile item-princiapl-menu-mobile" href="#">Calças</a></li>
            <li><a class="item-menu-mobile item-princiapl-menu-mobile" href="#">Calçados</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <!-- Carrega o conteúdo dinâmico -->
    <section class="content-dinamic"><?= $content ?></section>
    <!-- Carrega todo o JavaScript do site -->
    <script src="<?= $layout_js ?>"></script>
    <script src="<?= $view_js ?>"></script>
    <footer class="rodape">
      <p>Luky Store Oficial © Todos os direitos reservados <br><br>
        CNPJ: 12.345.678/0001-10
      </p>
    </footer>
  </div>
</body>
</html>