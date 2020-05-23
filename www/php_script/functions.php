<?php

$mysql = new mysqli('localhost','root','root','tester');

function DataSetToArray($data){
  $array = array();
  while (($row = $data->fetch_assoc()) != false) {
    $array[] = $row;
  }
  return $array;
}

function get_tests() {
  global $mysql;
  $out = $mysql->query("SELECT * FROM `test` WHERE `user_id`='{$_COOKIE["userid"]}';") or die($mysql->error);
  $tests = DataSetToArray($out);
  return $tests;
}

function get_curr_test() {
  global $mysql;
  $out = $mysql->query("SELECT * FROM `test` WHERE `id`={$_GET['edit_t']};") or die($mysql->error);
  $test =$out->fetch_assoc();
  return $test;
}

function del_test() {
  if (isset($_GET['del_t'])) {
    global $mysql;
    $mysql->query("DELETE FROM `test` WHERE `id`={$_GET['del_t']}");
  }
}

function get_questions() {
  global $mysql;
  $out = $mysql->query("SELECT * FROM `question` WHERE `test_id`='{$_GET['edit_t']}'") or die($mysql->error);
  $questions = DataSetToArray($out);
  return $questions;
}

function del_questions() {
  if (isset($_GET['del_q'])) {
    global $mysql;
    $mysql->query("DELETE FROM `question` WHERE `id`={$_GET['del_q']}");
  }
}

function get_answers() {
  global $mysql;
  $out = $mysql->query("SELECT * FROM `answer` WHERE `question_id`='{$_GET['edit_q']}'") or die($mysql->error);
  $questions = DataSetToArray($out);
  return $questions;
}

function del_answers() {
  if (isset($_GET['del_a'])) {
    global $mysql;
    $mysql->query("DELETE FROM `answer` WHERE `id`={$_GET['del_a']}");
  }
}

function get_students() {
  global $mysql;
  $out = $mysql->query("SELECT * FROM `student` WHERE `user_id`='{$_COOKIE["userid"]}' ORDER BY `team_id`;") or die($mysql->error);
  $students = DataSetToArray($out);
  return $students;
}

function get_student_group($team_id) {
  global $mysql;
  $out = $mysql->query("SELECT * FROM `team` WHERE `id`='{$team_id}';") or die($mysql->error);
  $group = $out->fetch_assoc();
  return $group;
}

function del_students() {
  if (isset($_GET['del_u'])) {
    global $mysql;
    $mysql->query("DELETE FROM `student` WHERE `id`={$_GET['del_u']}");
  }
}

function get_groups() {
  global $mysql;
  $out = $mysql->query("SELECT * FROM `team` WHERE `user_id`='{$_COOKIE["userid"]}';") or die($mysql->error);
  $groups = DataSetToArray($out);
  return $groups;
}

function del_groups() {
  if (isset($_GET['del_g'])) {
    global $mysql;
    $mysql->query("DELETE FROM `team` WHERE `id`={$_GET['del_g']}");
  }
}

function get_current_result() {
  global $mysql;
  $sql = "SELECT `r`.`id`, `r`.`stud_id`, `q`.`name`, `r`.`points` FROM `results` AS `r`
    INNER JOIN `question` AS `q` ON `r`.`question_id` = `q`.`id`
    INNER JOIN `student` AS `s` ON `r`.`stud_id` = `s`.`id`
    LEFT JOIN `team` AS `t` ON `s`.`team_id`=`t`.`id`
    WHERE `r`.`user_id`='{$_COOKIE["userid"]}' AND `r`.`stud_id`='{$_GET["edit_r"]}'";
  $out = $mysql->query($sql) or die($mysql->error);
  $res = DataSetToArray($out);
  return $res;
}

function del_current_result() {
  if (isset($_GET['del_cr'])) {
    global $mysql;
    $mysql->query("DELETE FROM `results` WHERE `id`={$_GET['del_cr']}");
  }
}

function get_results() {
  global $mysql;
  $sql = "SELECT `r`.`stud_id`, `s`.`second_name`, `s`.`name`, `t`.`name` AS `team`, SUM(`q`.`weight`) AS `points` FROM `results` AS `r`
    INNER JOIN `question` AS `q` ON `r`.`question_id` = `q`.`id`
    INNER JOIN `student` AS `s` ON `r`.`stud_id` = `s`.`id`
    LEFT JOIN `team` AS `t` ON `s`.`team_id`=`t`.`id`
    WHERE `r`.`user_id`='{$_COOKIE["userid"]}'
    GROUP BY `r`.`stud_id`";
  $out = $mysql->query($sql) or die($mysql->error);
  $res = DataSetToArray($out);
  return $res;
}

function del_results() {
  if (isset($_GET['del_r'])) {
    global $mysql;
    $mysql->query("DELETE FROM `results` WHERE `stud_id`={$_GET['del_r']} AND `user_id`='{$_COOKIE["userid"]}'");
  }
}

function tp_get_tests() {
  global $mysql;
  $sql = "SELECT `t`.* FROM `test` AS `t`
    INNER JOIN `users` AS `u` ON `t`.`user_id` = `u`.`id`
    INNER JOIN `student` AS `s` ON `u`.`id` = `s`.`user_id`
    WHERE `s`.`id` = '{$_COOKIE["studid"]}'";
  $out = $mysql->query($sql) or die($mysql->error);
  $tests = DataSetToArray($out);
  return $tests;
}

function tp_get_current_test() {
  global $mysql;
  $out = $mysql->query("SELECT * FROM `test` WHERE `id`={$_GET['test']};") or die($mysql->error);
  $test = $out->fetch_assoc();
  return $test;
}

function tp_get_questions() {
  global $mysql;
  $sql = "SELECT * FROM `question` AS `q`
    WHERE `q`.`id` NOT IN ( SELECT `question_id` FROM `results` )
    AND `q`.`test_id` = {$_GET['test']}";
  $out = $mysql->query($sql) or die($mysql->error);
  $question = DataSetToArray($out);
  return $question;
}

function tp_get_current_question() {
  global $mysql;
  $out = $mysql->query("SELECT * FROM `question` WHERE `id`={$_GET['question']};") or die($mysql->error);
  $question = $out->fetch_assoc();
  return $question;
}

function tp_get_answers() {
  global $mysql;
  $sql = "SELECT * FROM `answer` WHERE `question_id` = {$_GET['question']}";
  $out = $mysql->query($sql) or die($mysql->error);
  $answer = DataSetToArray($out);
  return $answer;
}

function tp_get_results() {
  global $mysql;
  $sql = "SELECT SUM(`r`.`points`) AS `points` FROM `results` AS `r`
    INNER JOIN `question` AS `q` ON `r`.`question_id` = `q`.`id`
    INNER JOIN `test` AS `t` ON `q`.`test_id` = `t`.`id`
    WHERE `t`.`id` = '{$_GET["end"]}' AND `r`.`stud_id` = '{$_COOKIE["studid"]}'
    GROUP BY `t`.`id`";
  $out = $mysql->query($sql) or die($mysql->error);
  $res = $out->fetch_assoc();
  return $res;
}

function tp_get_maxpoints() {
  global $mysql;
  $out = $mysql->query("SELECT `test`.`name`, `test`.`description`, SUM(`question`.`weight`) AS `maxpoints` FROM `question`
    INNER JOIN `test` ON `question`.`test_id` = `test`.`id`
    WHERE `test_id` = '{$_GET["end"]}'") or die($mysql->error);
  $points = $out->fetch_assoc();
  return $points;
}

?>
