<?php
 	require 'php_script/functions.php';
	//var_dump(get_questions());
 ?>
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
    <!-- Header -->
  	<?php require 'header.php'; ?>

    <div class="main">
      <div class="control-panel">
        <div class="cp-content">
          <div class="cp-content-header">
            Тесты
          </div>
          <div class="cp-content-main">

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
