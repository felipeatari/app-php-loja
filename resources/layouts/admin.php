<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/resources/style.css">

  <link rel="stylesheet" href="<?= $layout_css ?>">
  <link rel="stylesheet" href="<?= $view_css ?>">
  <title><?= $layout_title ?></title>
</head>

<body>
  <!-- Carrega o conteúdo dinâmico -->
  <div class="w-full h-screen flex bg-red-300">
    <!-- Coluna esquerda -->
    <div class="w-96 h-screen flex flex-col justify-between items-center bg-gray-900 p-2.5">
      <!-- Menu -->
      <nav class="w-full text-white">
        <div class="flex flex-col justify-center items-center">
          <a href="<?= URL ?>"><img class="w-24" src="/resources/assets/images/logo3.png" alt=""></a>
          <p class="mt-8 mb-16">Dashboard - Luky Store Oficial</p>
        </div>
        <ul class="">
          <a class="w-full flex hover:bg-slate-950 my-2 p-1 text-sm" href="<?= URL ?>/admin">Home</a>
          <li class="group my-2">
            <p class="w-full hover:bg-slate-950 p-1 text-sm">Produtos</p>
            <ul class="hidden group-hover:block p-1 bg-slate-950 text-xs">
              <a href="<?= URL ?>/admin/produto/categorias"><li class="hover:bg-sky-950 my-2 p-1">Categorias</li></a>
              <a href="<?= URL ?>/admin/produto/listar"><li class="hover:bg-sky-950 my-2 p-1">Listar</li></a>
              <a href="<?= URL ?>/admin/produto/cadastrar"><li class="hover:bg-sky-950 my-2 p-1">Cadastrar</li></a>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- Rodapé -->
      <div class="w-full flex flex-col items-center bg-white p-1 text-xs text-slate-950">
        <!-- <p class="font-bold">Luky Store Oficial</p> -->
        <p>© Todos os direitos reservados</p>
        <p>CNPJ: 12.345.678/0001-10</p>
      </div>
    </div>
    <!-- Coluna direita -->
    <div class="w-full h-screen bg-neutral-100">
      <?= $content ?>
    </div>
    <!-- Carrega todo o JavaScript do site -->
    <script src="<?= $layout_js ?>"></script>
    <script src="<?= $view_js ?>"></script>
  </div>
</body>

</html>