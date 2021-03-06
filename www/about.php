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

    <!-- Main -->
    <div class="mainpage">
      <div class="panel">
        <div class="panel-text">
          <h1>Система тестирования Online Tester</h1>
          <p>
            Добро пожаловать в систему тестирования Online Tester.
            Инструментарий сайта позволяет построить систему проверки знаний с помощью тестов, затратив при этом минимум усилий.
            Для управления системой тестирования не нужно привлекать ни системных администраторов, ни программистов.
            Заниматься обслуживанием может рядовой сотрудник с навыками пользователя ПК.
            На страницах нашего сайта нет информации, которая будет отвлекать от прохождения теста.
            Основная идея — проводить интерактивное тестирование знаний студентов и учеников.
          </p>
          <p>
            Оценку знаний сотрудников или учеников можно упростить до трех шагов:
          </p>
        </div>
        <div class="cardbar">
					<div class="card panel-text">
						<div class="card-header">Тесты</div>
						<div>
							<h3>Достаточно создать тест в простом и удобном редакторе</h3>
              Система тестирования Online Tester позволяет создать как простые тесты для проверки знаний,
              так и сложные психологические тестирования. После прохождения теста Вы можете отслеживать результаты участников.
						</div>
					</div>
          <div class="card panel-text">
            <div class="card-header">Редактор</div>
            <div>
              <h3>Добавьте вопросы из которых будет состоять Ваш тест</h3>
              Вы можете создавать и редактировать тесты с помощью простого и удобного конструктора тестов.
              Ответы на вопросы могут быть как однозначные, так и множественные.
              Каждому вопросу можно установить "вес" - количество баллов, которые тестируемый получит за правильный ответ.
            </div>
          </div>
          <div class="card panel-text">
            <div class="card-header">Пользователи</div>
            <div>
              <h3>Зарегистрируйте тестируемых</h3>
              Назначьте каждому пользователю email и пароль, с помошью которых он войдет в систему.
              Вы можете разделить пользователей на группы, для Вашего удобства.
              По завершению теста все пользователи видят сообщение с результатами пройденного теста.
            </div>
          </div>
          <div class="panel-text">
            <p>
              Используйте сайт для проверки знаний учащихся и персонала.
              Создавайте тесты и контролируйте успеваемость.
              &nbsp;
              <?php
                if ($_COOKIE['user'] == '') {
                  if ($_COOKIE['student'] == ''): ?>
                    <a href="registration.php" class="btn">Начать пользоваться</a>
                  <?php else:?>
                  <a class="btn" href="testpanel.php">Начать тестирование</a>
                  <?php endif; ?>
                  <?php } else { ?>
                  <a class="btn" href="controlpanel.php">Начать пользоваться</a>
                  <?php } ?>
            </p>
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
