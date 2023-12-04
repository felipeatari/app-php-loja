<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="<?= $theme_css ?>">
  <title><?= $theme_title ?></title>
</head>
<body>
  <div class="container">
    <header>
    </header>
    <!-- Carrega o conteúdo dinâmico -->
    <div class="content-dinamic"><?= $content ?></div>
    <!-- Carrega todo o JavaScript do site -->
    <script src="<?= $theme_js ?>"></script>
    <footer class="rodape">
      <p>Luky Store Oficial © Todos os direitos reservados <br><br>
        CNPJ: 12.345.678/0001-10
      </p>
    </footer>
  </div>
</body>
</html>