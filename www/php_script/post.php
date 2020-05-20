<?php
$mysql = new mysqli('localhost','root','root','tester');

if (isset($_POST['new_t'])) { //добавление нового теста
  $testname = filter_var(trim($_POST['testname']),
  FILTER_SANITIZE_STRING);
  $desc = filter_var(trim($_POST['desc']),
  FILTER_SANITIZE_STRING);
  if($testname == '') {
    echo "Введите название теста";
    exit();
  }
  $mysql->query("INSERT INTO `test`(`user_id`, `name`, `description`) VALUES ('{$_COOKIE['userid']}', '$testname', '$desc');");
  $mysql->close();
  header('Location: /controlpanel.php');
}

if (isset($_POST['new_q'])) { //добавление нового вопроса
  $question = filter_var(trim($_POST['question']),
  FILTER_SANITIZE_STRING);
  $desc = filter_var(trim($_POST['desc']),
  FILTER_SANITIZE_STRING);
  $weight = filter_var(trim($_POST['weight']),
  FILTER_SANITIZE_STRING);
  if($question == '' || $weight == '') {
    echo "Введите название вопроса, количество баллов и описание";
    exit();
  }
  $mysql->query("INSERT INTO `question`(`test_id`, `name`, `description`, `weight`)
    VALUES ('{$_POST['test_id']}', '$question', '$desc', '$weight');");
  $mysql->close();
  header("Location: /controlpanel.php?edit_t=" . $_POST['test_id']);
}


if (isset($_POST['new_a'])) { //добавление нового ответа
  $answer = filter_var(trim($_POST['answer']),
  FILTER_SANITIZE_STRING);
  if($answer == '') {
    echo "Введите ответ";
    exit();
  }
  $correct = isset($_POST['correct']) && $_POST['correct'] == 'Yes' ? 1 : 0;
  $mysql->query("INSERT INTO `answer`(`question_id`, `answer`, `correct`)
    VALUES ('{$_POST['question_id']}', '$answer', $correct);");
  $mysql->close();
  header("Location: /controlpanel.php?edit_q=" . $_POST['question_id']);
}

if (isset($_POST['new_u'])) { //добавление нового пользователя
  $email = filter_var(trim($_POST['email']),
  FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']),
  FILTER_SANITIZE_STRING);
  $pass = md5($pass."qwe");
  $name = filter_var(trim($_POST['name']),
  FILTER_SANITIZE_STRING);
  $secname = filter_var(trim($_POST['secname']),
  FILTER_SANITIZE_STRING);
  $group = $_POST['group'];

  if($email == '' || $pass == '' || $name == '' || $secname == '') {
    echo "Введены не корректные данные";
    exit();
  }
  $sql = $group==0?"INSERT INTO `student`(`user_id`, `email`, `pass`, `name`, `second_name`) VALUES
    ('{$_COOKIE['userid']}', '$email', '$pass', '$name', '$secname');" :
  "INSERT INTO `student`(`user_id`, `team_id`, `email`, `pass`, `name`, `second_name`) VALUES
    ('{$_COOKIE['userid']}', '$group', '$email', '$pass', '$name', '$secname');";
  $mysql->query($sql);
  $mysql->close();
  header("Location: /controlpanel.php?edit_u=" . $_COOKIE['userid']);
}

if (isset($_POST['new_g'])) { //добавление новой группы
  $name = filter_var(trim($_POST['name']),
  FILTER_SANITIZE_STRING);
  if($name == '') {
    echo "Введите ответ";
    exit();
  }
  $mysql->query("INSERT INTO `team`(`user_id`, `name`)
    VALUES ('{$_COOKIE['userid']}', '$name');");
  $mysql->close();
  header("Location: /controlpanel.php?edit_g=" . $_COOKIE['userid']);
}
?>
