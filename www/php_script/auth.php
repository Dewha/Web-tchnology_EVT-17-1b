<?php
	$email = filter_var(trim($_POST['email']),
	FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']),
	FILTER_SANITIZE_STRING);
	
	$password = md5($password."ivan");
	
	$mysql = new mysqli('localhost','root','root','auth');
	
	$out = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$password'");
	$user = $out->fetch_assoc();
	if (count($user) == 0) {
		echo "Пользователь не найден";
		exit();
	}
	setcookie('user', $user['email'], time() + 3600 * 24, "/");
	$mysql->close();
	header('Location: /');
?>