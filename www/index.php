<!DOCTYPE html>
<html lang='ru'>
<head>
	<!--кодировка-->
	<meta charset="UTF-8">
	<!--размер страницы под устройства-->
	<meta name="viewport" content="width=device-width",initial-scale="1.0">
	<!--для браузера edge и ie-->
	<meta http-equiv="X-UA-Compatitable content="ie="edge">
	<link rel="stylesheet" href="css\style.css">
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
					<img src="img\test.png" class="num">
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
					<img src="img\test.png" class="num">
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
					<img src="img\test.png" class="num">
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
					<img src="img\test.png" class="num">
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
	<?php require 'footer.php'; ?>
	<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
