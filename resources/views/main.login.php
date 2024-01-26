<style>
  .login{
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .login form{
    display: flex;
    flex-direction: column;
    padding: 20px;
  }
  .login form input{
    margin-top: 3px;
    margin-bottom: 3px;
  }
</style>
<div class="login">
  <form action="<?=URL . '/entrar'?>" method="POST">
    <div>Login: <input type="text" name="login" id="login"></div>
    <div>Senha: <input type="text" name="senha" id="senha"></div>
    <input type="submit" value="enviar">
  </form>
</div>