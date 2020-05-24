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
	<link rel="icon" href="img/question.ico" type="image/x-icon"/>
	<title>Online Tester</title>
</head>
<body>
	<div class="content">
		<!--header-->
		<?php require 'header.php'; ?>

		<!--sign-in-->
		<?php require 'signin.php'; ?>

		<!--Banner-->
		<div class="banner">
			<h1 class="banner-text-big"> Система тестирования Online Tester </h1>
			<h2 class="banner-text-small"> Онлайн сервис для проверки знаний</h2>
		</div>

		<!--Main-->
		<div class="mainpage">
			<h3 class="grid-header">Как это работает?</h3>
			<div class="grid">
				<div class="grid-content">
					<img src="img/1.png" class="num">
					<div class="grid-text">
						<h3>Зарегистрируйтесь</h3>
						<div>
							Достачно указать Ваш емэйл, пароль и название организации.
							Сразу после регистрации Вы попадете в кабинет администратора и сможете начать работать.
							Система сразу готова к работе, не требуется скачивать и устанавливать какие-либо программы,
							необходим только браузер и доступ в интернет. Онлайн сервис работает на компьютере, планшете и телефоне.
						</div>
					</div>
				</div>
				<div class="grid-content">
					<img src="img/2.png" class="num">
					<div class="grid-text">
						<h3>Создайте тест</h3>
						<div>
							Создайте и настройте свое тестирование. Заполните базу вопросов и ответов к ним.
							Простой и удобный редактор позволяют составлять как простые тесты для проверки знаний,
							так и сложные психологические тестирования.
						</div>
					</div>
				</div>
				<div class="grid-content">
					<img src="img/3.png" class="num">
					<div class="grid-text">
						<h3>Добавьте пользователей</h3>
						<div>
							Зарегистрируйте Ващих тестируемых. Введите их email и пароль с помошью которых они войдут в систему.
							У Вас нет ограничений по количеству пользователей, тестов и сеансов тестирований. Работайте без ограничений!
						</div>
					</div>
				</div>
				<div class="grid-content">
					<img src="img/4.png" class="num">
					<div class="grid-text">
						<h3>Получайте результаты</h3>
						<div>
							Все результаты для Ваших тестов доступны в кабинете администратора.
							Вы можете видеть детальную информацию, включая ответы на конкретные вопросы.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Footer-->
	<?php require 'footer.php'; ?>
	<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
