<div id="gray" onclick="close_popup()"></div>
<div id="window">
  <img src="img/close.png" class="close" onclick="close_popup()">
  <div class="sign-in-form">
    <h2>Вход</h2>
    <form action="php_script/auth.php" method="POST">
      <input type="email" placeholder="E-mail" name="email" class="input">
      <input type="password" placeholder="Пароль" name="password" class="input">
      <input type="submit" name="sign-in" value="Войти" class="btn input">
      <a class="btn input" href="registration.php">Регистрация</a>
    </form>
  </div>
</div>
