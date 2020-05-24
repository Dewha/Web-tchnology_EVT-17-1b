<?php
 	require 'php_script/functions.php';
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
	<link rel="icon" href="img/question.ico" type="image/x-icon"/>
	<title>Online Tester</title>
</head>
<body onload="js_getParamTP()">
  <?php
    if($_COOKIE['student'] == ''){ # проверка зашел ли пользователь на сайт
      echo "Пользователь не найден";
      exit();
    } ?>
  <div class="content">
    <!-- Header -->
  	<?php require 'header.php'; ?>

    <div class="main">
      <div class="control-panel">

        <!-- testlist -->
        <div class="cp-content" id="testlist">
          <div class="cp-content-header">
            Тесты
          </div>
          <div class="cp-content-main">
            <!--records-->
						<?php
              $tests = tp_get_tests();
							if (count($tests) == 0) echo "Записей не обнаружено";
							for($i = 0;$i<count($tests);$i++): ?>
							<div class="cp-record">
								<div class="cp-record-text">
									<?php echo $tests[$i]['name']?>
								</div>
								<div>
                  <a href="?test=<?=$tests[$i]['id']?>">
                    <div class="cp-btn">
                      Открыть
                    </div>
                  </a>
								</div>
							</div>
						<?php endfor; ?>
          </div>
        </div>

        <!-- opentest -->
        <div class="cp-content" id="opentest">
          <div class="cp-content-header">
            Открыть тест
            <div>
              <a href="testpanel.php">
                <div class="cp-btn">
                  Назад
                </div>
              </a>
              <?php
                if (isset($_GET['test'])) {
                  $questions = tp_get_questions();
                  $test = tp_get_current_test();
                  $passed = count($questions)!=0 ? "?test={$_GET['test']}&question={$questions[0]['id']}" : "?end={$_GET['test']}";
                }
              ?>
              <a href="<?=$passed?>">
                <div class="cp-btn">
                  Начать тестирование
                </div>
              </a>
            </div>
          </div>
          <div class="cp-content-main">
            <!-- testname -->
            <div class="cp-record cp-record-title">
              <div class="cp-record-text">
                <?php echo $test['name'] ?>
              </div>
            </div>
            <!-- description -->
            <div class="cp-record cp-record-title">
              <div class="cp-record-text">
                <?php echo $test['description'] ?>
              </div>
            </div>
          </div>
        </div>

        <!-- starttest -->
        <div class="cp-content" id="starttest">
          <?php //определение следующего и предыдущего вопроса
          if (isset($_GET['test'])) {
            $q = tp_get_questions();
            for ($i=0; $i < count($q); $i++) {
              if ($_GET['question'] == $q[$i]['id']) {$id = $i; break;}
            }
            if (count($q)!=1) {
              $prev = $_GET['question'] == $q[0]['id'] ? $q[0]['id'] : $q[$id - 1]['id'];
              $next = $_GET['question'] == $q[count($q)-1]['id'] ? $q[count($q)-1]['id'] : $q[$id + 1]['id'];
            } else {
              $prev = $q[0]['id'];
              $next = $q[0]['id'];
            }
          }
          ?>
          <div class="cp-content-header">
            Тестирование
            <div>
              <a href="?test=<?=$_GET['test']?>&question=<?=$prev?>">
                <div class="cp-btn">
                  Назад
                </div>
              </a>
              <a href="?test=<?=$_GET['test']?>&question=<?=$next?>">
                <div class="cp-btn">
                  Далее
                </div>
              </a>
              <a href="?end=<?=$_GET['test']?>">
                <div class="cp-btn">
                  Закончить
                </div>
              </a>
            </div>
          </div>
          <div class="cp-content-main">
            <?php
            if (isset($_GET['question'])) {
              if ($_GET['question']!='') {
                $question = tp_get_current_question();
                $answers = tp_get_answers();
              }
            }?>
            <!-- question -->
            <div class="cp-record cp-record-title">
              <div class="cp-record-text">
                <?php echo $question['name'] ?>
              </div>
            </div>
            <!-- description -->
            <div class="cp-record cp-record-title">
              <div class="cp-record-text">
                <?php echo $question['description'] ?>
              </div>
            </div>
            <!--answers-->
            <?php if (count($answers) == 0) echo "Ответов нет" ?>
            <form action="php_script/post.php" method="POST" class="cp-newtest">
              <?php
                for($i = 0;$i<count($answers);$i++): ?>
                <div class="cp-record">
                  <div class="cp-record-text">
                    <?php echo $answers[$i]["answer"]?>
                  </div>
                  <div>
                    <input type="checkbox" name="choice[]" value="<?=$answers[$i]["id"] ?>">
                  </div>
                </div>
              <?php endfor; ?>
              <input type="hidden" name="question" value='<?=$question['id']?>'>
              <input type="hidden" name="test" value='<?=$_GET['test']?>'>
              <input type="hidden" name="answered" value='1'>
              <input type="submit" name="save" value="Ответить" class="cp-btn">
            </form>
          </div>
        </div>


        <!-- endtest -->
        <div class="cp-content" id="endtest">
          <div class="cp-content-header">
            Тест завершен
            <?php $res = tp_get_results(); $maxpoints = tp_get_maxpoints(); ?>
            <div>
              <a href="testpanel.php">
                <div class="cp-btn">
                  Назад
                </div>
              </a>
            </div>
          </div>
          <div class="cp-content-main">
            <?php if (count($res)==0): ?>
              <div class="cp-record cp-record-title">
                <div class="cp-record-text">
                  <?php echo "Результатов нет" ?>
                </div>
              </div>
            <?php else : ?>
            <!-- testname -->
            <div class="cp-record cp-record-title">
              <div class="cp-record-text">
                <?php echo $maxpoints['name'] ?>
              </div>
            </div>
            <!-- description -->
            <div class="cp-record cp-record-title">
              <div class="cp-record-text">
                <?php echo $maxpoints['description'] ?>
              </div>
            </div>
            <!-- results -->
            <div class="cp-record">
              <div class="cp-record-text">
                <?php echo "Результаты теста: <br> Вы набрали {$res['points']} баллов из {$maxpoints['maxpoints']} возможных";?>
              </div>
            </div>
          <?php endif; ?>
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
