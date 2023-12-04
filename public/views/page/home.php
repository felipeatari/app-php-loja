<!-- Página Inicial -->
<div class="home">
  <!-- Banner Slider -->
  <div class="bloco-banner-slider">
    <div class="slider-btns">
      <button class="slider-btn" onclick="voltar()">
        <svg class="slider-btn-svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
      </button>
        <button class="slider-btn" onclick="avancar()">
          <svg class="slider-btn-svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
        </button>
    </div>
    <div class="banner-slider">
      <img class="slider-item"></img>
    </div>
  </div>

  <!-- Lançamentos -->
  <div class="bloco-lancamentos">
    <div class="lancamentos-titulo">
      <h3>Confira nossos lançamentos</h3>
    </div>
    <div class="lancamentos">
      <?php for ($i = 1; $i <= 10; $i++): ?>
        <div class="lancamento">
          <div class="lancamento-items">
            <div class="lancamento-foto-produto"></div>
            <p>Produto <?=$i?></p>
            <p>R$ 75,00</p>
          </div>
        </div>
      <?php endfor ?>
    </div>
  </div>
</div>