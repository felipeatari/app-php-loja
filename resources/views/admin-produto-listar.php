<div class="admin-produto-listar">
  <!-- Carregar produtos -->
  <div class="content-produto">
    <h1>produtos dos Produtos</h1>
    <button class="btn-abrir-criar-produtos">Criar Produto</button>
    <table border="1" width="1000">
      <thead>
        <tr>
          <th>ID</th>
          <th>Categoria ID</th>
          <th>Nome</th>
          <th>Editar</th>
          <th>Apagar</th>
        </tr>
      </thead>
      <tbody>
        <?php if (isset($produtos) and ! empty($produtos)) { ?>
          <?php foreach ($produtos as $produto) : ?>
            <tr>
              <td><?= $produto->id  ?></td>
              <td><?= $produto->categoria_id ?></td>
              <td><?= $produto->nome ?></td>
              <td><button value="<?= $produto->categoria_id ?>" id="categoria-id-<?= $produto->id ?>" class="btn-editar" onclick="editar(<?= $produto->id ?>)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                  </svg></button></td>
              <td><button value="<?= $produto->nome ?>" id="nome-<?= $produto->id ?>" class="btn-apagar" onclick="apagar(<?= '\'' . URL . '/admin/produto/produtos?action=apagar&id=' . $produto->id . '\'' ?>)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.
                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                  </svg></button></td>
            </tr>
          <?php endforeach; ?>
        <?php } else { ?>
          <tr>
            <td> - </td>
            <td> - </td>
            <td> - </td>
            <td><button class="btn-editar"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                </svg></button></td>
            <td><button class="btn-apagar"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.
                  <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                </svg></button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<style>
    .admin-produto-listar {
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  /* Carregar produto */
  .content-produto {
    margin-top: 40px;
  }

  .content-produto h1 {
    font-size: 15pt;
    color: #19263f;
  }

  .content-produto table {
    border-collapse: collapse;
    font-size: 10pt;
  }

  .content-produto table th {
    height: 60px;
    background-color: #19263f;
    color: white;
  }

  .content-produto table td,
  th {
    text-align: center;
    padding: 8px;
    border: 1px solid #ddd;
  }
</style>