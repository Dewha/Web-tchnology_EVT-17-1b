<!DOCTYPE html>
<html lang='ru'>
<head>
	<!--кодировка-->
	<meta charset="UTF-8">
	<!--размер страницы под устройства-->
	<meta name="viewport" content="width=device-width",initial-scale=1.0">
	<!--для браузера edge и ie-->
	<meta http-equiv="X-UA-Compatitable content="ie=edge">
	<link rel="stylesheet" href="css/style.css">
	<title>Online Tester</title>
</head>
<body>
	<div class="content">
		<!--header-->
		<header>
			<h1 class="logo">Online Tester</h1>
			<nav class="header-right">
				<a class="text-dark" href="index.html">Главная</a>
				<a class="text-dark" href="#">Возможности</a>
				<a class="text-dark" href="#">Авторы</a>
			</nav>
				<a class="btn" onclick="show_popup()">Войти</a>
		</header>

		<!--sign-in-->
		<div id="gray" onclick="close_popup()"></div>
		<div id="window">
			<img src="C:\Users\Андрей\Desktop\универ\сайт\img\close.png" class="close" onclick="close_popup()">
			<div class="sign-in-form">
				<h2>Вход</h2>
				<form action="index.html" name="f1">
					<input type="email" placeholder="E-mail" name="email" class="input">
					<input type="password" placeholder="Пароль" name="password" class="input">
					<input type="submit" name="sign-in" value="Войти" class="btn input">
					<a class="btn input" href="registration.html">Регистрация</a>
				</form>
			</div>
		</div>

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
					<img src="C:\Users\Андрей\Desktop\универ\сайт\test.png" class="num">
					<div class="grid-text">
						<h4>Шаг 1</h4>
						<div>Lorem ipsum dolor sit amet,
							consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.
							Ut enim ad minim veniam, quis nostrud exercitation
							ullamco laboris nisi ut aliquip ex ea commodo consequat.
							Duis aute irure dolor in reprehenderit in voluptate velit
							esse cillum dolore eu fugiat nulla pariatur. Excepteur
							sint occaecat cupidatat non proident, sunt in culpa qui
							officia deserunt mollit anim id est laborum.</div>
					</div>
				</div>
				<div class="grid-content">
					<img src="C:\Users\Андрей\Desktop\универ\сайт\test.png" class="num">
					<div class="grid-text">
						<h4>Шаг 2</h4>
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
							nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
							deserunt mollit anim id est laborum.</div>
					</div>
				</div>
				<div class="grid-content">
					<img src="C:\Users\Андрей\Desktop\универ\сайт\test.png" class="num">
					<div class="grid-text">
						<h4>Шаг 3</h4>
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
							dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
							anim id est laborum.</div>
					</div>
				</div>
				<div class="grid-content">
					<img src="C:\Users\Андрей\Desktop\универ\сайт\test.png" class="num">
					<div class="grid-text">
						<h4>Шаг 4</h4>
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
							nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
							in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
							occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Footer-->
	<footer>
		<div class="footer-text">
		<p class="footer-right">
			<a class="text-dark" href="#top">Наверх</a>
		</p>
		<p>Система онлайн-тестирования Online Tester<br>
			Лф ПНИПУ ЭВТ-17-1б 2020г.</p>
		</div>
	</footer>
	<script src="js/script.js" charset="utf-8"></script>
</body>
</html>
