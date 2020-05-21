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
	<title>Online Tester</title>
</head>
<body onload="js_getParam()" >
	<?php
		if($_COOKIE['user'] == ''){ # проверка зашел ли пользователь на сайт
			echo "Пользователь не найден";
			exit();
		}
    del_answers();
    del_questions();
    del_test();
    del_students();
    del_groups();
    del_results();
    del_current_result()
	?>
	<div class="content">
    <!-- header -->
		<?php require 'header.php'; ?>

		<div class="main">
			<div class="sidebar-section">
				<div class="sidebar-item" onclick="switch_page(1)">Тесты</div>
				<div class="sidebar-item" onclick="switch_page(3)">Пользователи</div>
				<div class="sidebar-item" onclick="switch_page(4)">Группы</div>
				<div class="sidebar-item" onclick="switch_page(5)">Результаты</div>
			</div>
			<div class="control-panel">

        <!--tests-->
				<div class="cp-content" id="tests">
					<div class="cp-content-header">
						Тесты
            <a href="?new_t=1">
              <div class="cp-btn">
                Новый тест
              </div>
            </a>
					</div>
					<div class="cp-content-main">
						<!--records-->
						<?php
              $tests = get_tests();
							if (count($tests) == 0) echo "Записей не обнаружено";
							for($i = 0;$i<count($tests);$i++): ?>
							<div class="cp-record">
								<div class="cp-record-text">
									<?php echo $tests[$i]["name"]?>
								</div>
								<div>
                  <a href="?edit_t=<?=$tests[$i]["id"]?>">
                    <div class="cp-btn">
                      Открыть
                    </div>
                  </a>
                  <a href="?del_t=<?=$tests[$i]["id"]?>">
                    <div class="cp-btn">
                      Удалить
                    </div>
                  </a>
								</div>
							</div>
						<?php endfor; ?>
          </div>
        </div>

          <!--editor new test-->
          <div class="cp-content" id="editor_newtest">
            <div class="cp-content-header">
              Редактор: новый тест
              <div class="cp-btn" onclick="switch_page(1)">
                Назад
              </div>
            </div>
            <form action="php_script/post.php" method="POST" class="cp-newtest">
              <input type="hidden" name="new_t" value='1'>
              <input type="text" placeholder="Название" name="testname" class="input">
              <textarea name="desc" rows="8" cols="80" placeholder="Описание" class="input"></textarea>
              <input type="submit" name="save" value="Сохранить" class="cp-btn">
            </form>
          </div>

          <!--editor question-->
          <div class="cp-content" id="editor_edittest">
            <div class="cp-content-header">
              Редактор: вопросы
              <div>
                <div class="cp-btn" onclick="switch_page(1)">
                  Назад
                </div>
                <a href="?new_q=<?=$_GET['edit_t']?>">
                  <div class="cp-btn">
                    Добавить вопрос
                  </div>
                </a>
              </div>
            </div>
            <div class="cp-content-main">
              <!--records-->
              <?php
              $questions = get_questions();
              if (count($questions) == 0) echo "Вопросы отсутствуют";
              for($i = 0;$i<count($questions);$i++): ?>
              <div class="cp-record">
                <div class="cp-record-text">
                  <?php echo $questions[$i]["name"]?>
                </div>
                <div>
                  <a href="?edit_t=<?=$_GET['edit_t']?>&edit_q=<?=$questions[$i]["id"]?>">
                    <div class="cp-btn">
                      Открыть
                    </div>
                  </a>
                  <a href="?edit_t=<?=$_GET['edit_t']?>&del_q=<?=$questions[$i]["id"]?>">
                    <div class="cp-btn">
                      Удалить
                    </div>
                  </a>
                </div>
              </div>
              <?php endfor; ?>
            </div>
          </div>

          <!--editor new question-->
          <div class="cp-content" id="editor_newquestion">
            <div class="cp-content-header">
              Редактор: новый вопрос
              <a href="?edit_t=<?=$_GET['new_q']?>">
                <div class="cp-btn">
                  Назад
                </div>
              </a>
            </div>
            <form action="php_script/post.php" method="POST" class="cp-newtest">
              <input type="hidden" name="new_q" value='1'>
              <input type="hidden" name="test_id" value='<?=$_GET['new_q']?>'>
              <input type="text" placeholder="Название" name="question" class="input">
              <input type="number" placeholder="Количество баллов" name="weight" class="input">
              <textarea name="desc" rows="8" cols="80" placeholder="Описание" class="input"></textarea>
              <input type="submit" name="save" value="Сохранить" class="cp-btn">
            </form>
          </div>

          <!--editor answer-->
          <div class="cp-content" id="editor_editquestion">
            <div class="cp-content-header">
              Редактор: ответы
              <div>
                <div class="cp-btn" onclick="switch_page(6)">
                  Назад
                </div>
                <a href="?new_a=<?=$_GET['edit_q']?>">
                  <div class="cp-btn">
                    Добавить ответ
                  </div>
                </a>
              </div>
            </div>
            <!--records-->
            <?php
              $answers = get_answers();
              if (count($answers) == 0) echo "Ответы отсутствуют";
              for($i = 0;$i<count($answers);$i++): ?>
              <div class="cp-record">
                <div class="cp-record-text">
                  <?php echo $answers[$i]["answer"];
                  if ($answers[$i]["correct"] == 1)
                  echo " (правильный)" ?>
                </div>
                <div>
                  <a href="?edit_t=<?=$_GET['edit_t']?>&edit_q=<?=$_GET['edit_q']?>&del_a=<?=$answers[$i]["id"]?>">
                    <div class="cp-btn">
                      Удалить
                    </div>
                  </a>
                </div>
              </div>
            <?php endfor; ?>
          </div>

          <!--editor new answer-->
          <div class="cp-content" id="editor_newanswer">
            <div class="cp-content-header">
              Редактор: добавить ответ
              <a href="?edit_q=<?=$_GET['new_a']?>">
                <div class="cp-btn">
                  Назад
                </div>
              </a>
            </div>
            <form action="php_script/post.php" method="POST" class="cp-newtest">
              <input type="hidden" name="new_a" value='1'>
              <input type="hidden" name="question_id" value='<?=$_GET['new_a']?>'>
              <input type="text" placeholder="Ответ" name="answer" class="input">
              <div class="cp-record">
                <div>
                  <input type="checkbox" name="correct" value="Yes" id="check">
                  <label for="check" class="label-checkbox">Правильный</label>
                </div>
              </div>
              <input type="submit" name="save" value="Сохранить" class="cp-btn">
            </form>
          </div>

          <!--users-->
  				<div class="cp-content" id="users">
  					<div class="cp-content-header">
  						Пользователи
              <a href="?new_u=1">
                <div class="cp-btn">
                  Новый пользователь
                </div>
              </a>
  					</div>
            <div class="cp-content-main">
              <!--records-->
              <?php
                $students = get_students();
                if (count($students) == 0) echo "Записей не обнаружено";
                for($i = 0;$i<count($students);$i++): ?>
                <div class="cp-record">
                  <div class="cp-record-text">
                    <?php $group = get_student_group($students[$i]["team_id"]) ?>
                    <?php echo "{$students[$i]["second_name"]} {$students[$i]["name"]}"?>
                  </div>
                  <div class="cp-record-sidetext">
                    <?php echo $group['name']?>
                  </div>
                  <a href="?del_u=<?=$students[$i]["id"]?>">
                    <div class="cp-btn">
                      Удалить
                    </div>
                  </a>
                </div>
              <?php endfor; ?>
            </div>
  				</div>

          <!--editor new user-->
          <div class="cp-content" id="editor_newuser">
            <div class="cp-content-header">
              Редактор: новый пользователь
              <a href="?edit_u=<?=$_GET['new_u']?>">
                <div class="cp-btn">
                  Назад
                </div>
              </a>
            </div>
            <form action="php_script/post.php" method="POST" class="cp-newtest">
              <input type="hidden" name="new_u" value='1'>
              <input type="email" placeholder="E-mail" name="email" class="input">
              <input type="text" placeholder="Пароль" name="pass" class="input">
              <input type="text" placeholder="Имя" name="name" class="input">
              <input type="text" placeholder="Фамилия" name="secname" class="input">
              <select name="group" placeholder="Группа" class="input">
                <option value="0">---Выберите группу---</option>
                <?php
                  $gr=get_groups();
                  foreach ($gr as $g) {
                    print '<option value="' . $g['id'] . '">' . $g['name'] . '</option>';
                  } ?>
              </select>
              <input type="submit" name="save" value="Сохранить" class="cp-btn">
            </form>
          </div>

          <!-- groups -->
  				<div class="cp-content" id="groups">
  					<div class="cp-content-header">
  						Группы
              <a href="?new_g=1">
                <div class="cp-btn">
                  Новая группа
                </div>
              </a>
  					</div>
            <div class="cp-content-main">
              <!--records-->
              <?php
                $group = get_groups();
                if (count($group) == 0) echo "Записей не обнаружено";
                for($i = 0;$i<count($group);$i++): ?>
                <div class="cp-record">
                  <div class="cp-record-text">
                    <?php echo $group[$i]["name"]?>
                  </div>
                  <div>
                    <a href="?del_g=<?=$group[$i]["id"]?>">
                      <div class="cp-btn">
                        Удалить
                      </div>
                    </a>
                  </div>
                </div>
              <?php endfor; ?>
            </div>
  				</div>

          <!--editor new group-->
          <div class="cp-content" id="editor_newgroup">
            <div class="cp-content-header">
              Редактор: новая группа
              <a href="?edit_g=<?=$_GET['new_g']?>">
                <div class="cp-btn">
                  Назад
                </div>
              </a>
            </div>
            <form action="php_script/post.php" method="POST" class="cp-newtest">
              <input type="hidden" name="new_g" value='1'>
              <input type="text" placeholder="Название группы" name="name" class="input">
              <input type="submit" name="save" value="Сохранить" class="cp-btn">
            </form>
          </div>

          <!-- results -->
  				<div class="cp-content" id="results">
  					<div class="cp-content-header">
  						Результаты
  					</div>
            <div class="cp-content-main">
              <?php
                $res = get_results();
                if (count($res) == 0) echo "Записей не обнаружено"; ?>
              <div class="cp-record cp-record-title">
                <div class="cp-record-text">
                  Тестируемый
                </div>
                <div class="cp-record-sidetext">
                  Группа
                </div>
                <div class="cp-record-sidetext">
                  Результат
                </div>
                <div class="cp-record-sidetext">
                  Действия
                </div>
              </div>
              <!--records-->
              <?php for($i = 0;$i<count($res);$i++): ?>
                <div class="cp-record">
                  <div class="cp-record-text">
                      <?php echo "{$res[$i]["second_name"]} {$res[$i]["name"]}"?>
                  </div>
                  <div class="cp-record-sidetext">
                    <?php echo $res[$i]["team"]?>
                  </div>
                  <div class="cp-record-sidetext">
                    <?php echo "{$res[$i]["points"]} баллов"?>
                  </div>
                  <a href="?edit_r=<?=$res[$i]["stud_id"]?>">
                    <div class="cp-btn">
                      Открыть
                    </div>
                  </a>
                  &nbsp;
                  <a href="?del_r=<?=$res[$i]["stud_id"]?>">
                    <div class="cp-btn">
                      Удалить
                    </div>
                  </a>
                </div>
              <?php endfor; ?>
            </div>
  				</div>

          <!-- editor results -->
  				<div class="cp-content" id="editor_results">
  					<div class="cp-content-header">
  						Результаты
              <div class="cp-btn" onclick="switch_page(5)">
                Назад
              </div>
  					</div>
            <div class="cp-content-main">
              <?php
                $res = get_current_result();
                if (count($res) == 0) echo "Записей не обнаружено";
                else { ?>
              <div class="cp-record cp-record-title">
                <div class="cp-record-text">
                  Вопрос
                </div>
                <div class="cp-record-sidetext"></div>
                <div class="cp-record-sidetext">
                  Баллы
                </div>
                <div class="cp-record-sidetext"></div>
              </div>
            <?php } ?>
              <!--records-->
              <?php for($i = 0;$i<count($res);$i++): ?>
                <div class="cp-record">
                  <div class="cp-record-text">
                      <?php echo $res[$i]["name"]?>
                  </div>
                  <div class="cp-record-sidetext">
                    <?php echo "{$res[$i]["weight"]} баллов"?>
                  </div>
                  <a href="?del_cr=<?=$res[$i]["id"]?>">
                    <div class="cp-btn">
                      Удалить
                    </div>
                  </a>
                </div>
              <?php endfor; ?>
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
