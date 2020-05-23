<!DOCTYPE html>
<html lang='ru'>
<head>
	<!--кодировка-->
	<meta charset="UTF-8">
	<!--размер страницы под устройства-->
	<meta name="viewport" content="width=device-width",initial-scale="1.0">
	<!--для браузера edge и ie-->
	<meta http-equiv="X-UA-Compatitable content="ie="edge">
	<link rel="stylesheet" href="css/style.css">
	<title>Online Tester</title>
</head>
    <div class="content">
      <!--Header-->
			<?php require 'header.php'; ?>

			<!--sign-in-->
			<?php require 'signin.php'; ?>

        <!-- registration -->
        <div class="registration">
          <div class="reg-form">
            <h2>Регистрация</h2>
            <form action="php_script/reg.php" method="POST">
              <input type="text" placeholder="Имя" name="name" class="input" id="name">
              <input type="text" placeholder="Фамилия" name="second_name" class="input" id="second_name">
              <input type="email" placeholder="E-mail" name="email" class="input" id= 'email'>
              <input type="text" placeholder="Организация" name="organization" class="input" id='organization'>
              <input type="password" placeholder="Пароль" name="pass1" class="input" id="pass1">
              <input type="password" placeholder="Повторите пароль" name="pass2" class="input" id='pass2'>
              <input type="submit" name="registation" value="Зарегистрироваться" class="btn input">
            </form>
          </div>
        </div>
    </div>
		
		<!--Footer-->
		<?php require 'footer.php'; ?>
		<script src="js\main.js" type="text/javascript" charset="utf-8"></script>
  </body>
</html>
