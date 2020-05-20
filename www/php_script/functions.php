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

?>
