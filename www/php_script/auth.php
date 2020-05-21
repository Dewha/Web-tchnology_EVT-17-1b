<?php
	$email = filter_var(trim($_POST['email']),
	FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']),
	FILTER_SANITIZE_STRING);

	$pass_u = md5($password."ivan");
	$pass_s = md5($password."qwe");

	$mysql = new mysqli('localhost','root','root','tester');

	$out = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$pass_u'");
	$user = $out->fetch_assoc();
	if (count($user) == 0) {
		$out = $mysql->query("SELECT * FROM `student` WHERE `email` = '$email' AND `pass` = '$pass_s'");
		$user = $out->fetch_assoc();
		if (count($user) == 0) {
			echo "Пользователь не найден";
			exit();
		} else { //вход для тестируемого
			setcookie('student', $user['email'], time() + 3600 * 24, "/");
			setcookie('studid', $user['id'], time() + 3600 * 24, "/");
			$mysql->close();
			header('Location: /');
		}
	}	else { //вход для тестирирующего
		setcookie('user', $user['email'], time() + 3600 * 24, "/");
		setcookie('userid', $user['id'], time() + 3600 * 24, "/");
		$mysql->close();
		header('Location: /controlpanel.php');
	}

?>
