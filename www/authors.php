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
          <h1>Авторы проекта</h1>
          <div class="cp-content-header">
            <p class="pt-center">
              Министерство науки и образования Российской Федерации
              Лысьвенский филиал федерального государственного бюджетного
              образовательного учреждения высшего образования
              «Пермский национальный исследовательский
              политехнический университет»
            </p>
          </div>
          <div class="panel-text">
            <div class="cp-record">
              Факультет: профессионального образования <br>
              Направление: 09.03.01 Информатика и вычислительная техника
            </div>
            <div class="pt-center-bottom">
              <div class="cp-record-title">
                Сайт разработан в рамках лабораторной работы <br>
                по дисциплине "Веб-технологии"
              </div>
            </div>
            <div class="cp-record-sidetext">
              <br>
              <div class="cp-record">
                Работу выполнили студенты группы ЭВТ-17-1б:
                <br><br>
                Щербинин А.В.<br>
                Соломатин А.А.<br>
                Колосов И.С.
              </div>
            </div>
            <div class="pt-center-bottom">
              <div class="cp-record-title">
                Лысьва 2020г.
              </div>
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
