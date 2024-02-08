<div class="bg-stone-100">
  <div class="">
    <form action="<?= URL . '/admin/produto/salvar' ?>" method="post">
      <br><br>
      <h1>Cadastrar Produto</h1><br><br>
      <div class="">
        Categoria:
        <select name="<?= $categoria->id ?>" id="">
          <?php foreach ($categorias as $categoria) : ?>
            <option value="<?= $categoria->id ?>"><?= $categoria->nome ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class=" text-red-700">Nome: <input type="text" name="nome" id=""></div>
      <div class="">Descrição: <input type="text" name="descricao" id=""></div>
      <div class="">Preço Custo: <input type="number" name="preco_custo" id=""></div>
      <div class="">Preço Venda: <input type="number" name="preco_venda" id=""></div>
      <div class="">Peso: <input type="number" name="peso" id=""></div>
      <div class="">Altura: <input type="number" name="altura" id=""></div>
      <div class="">Largura: <input type="number" name="largura" id=""></div>
      <div class="">Profundidade: <input type="number" name="profundidade" id=""></div>
      <div class="">Foto: <input type="file" name="foto" id=""></div>
      <div class="">Foto URL: <input type="text" name="foto_url" id=""></div>
      <br><button type="submit">salvar</button>
    </form>
  </div>
  <div class="">
    <form action="<?= URL . '/admin/produto/salvar' ?>" method="post">
      <br><br>
      <h1>Cadastrar Sku</h1><br><br>
      <div class="">
        Variação 1:
        <select name="<?= $categoria->id ?>" id="">
          <?php foreach ($categorias as $categoria) : ?>
            <option value="<?= $categoria->id ?>"><?= $categoria->nome ?></option>
          <?php endforeach; ?>
        </select>

        Variação 2:
        <select name="<?= $categoria->id ?>" id="">
          <?php foreach ($categorias as $categoria) : ?>
            <option value="<?= $categoria->id ?>"><?= $categoria->nome ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="">Nome: <input type="text" name="nome" id=""></div>
      <div class="">Preço Custo: <input type="number" name="preco_custo" id=""></div>
      <div class="">Preço Venda: <input type="number" name="preco_venda" id=""></div>
      <div class="">Peso: <input type="number" name="peso" id=""></div>
      <div class="">Estoque: <input type="number" name="estoque" id=""></div>
      <br><button type="submit">Salvar</button>
    </form>
  </div>
</div>
<style>
</style>