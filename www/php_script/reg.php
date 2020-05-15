<?php
	$name = filter_var(trim($_POST['name']),
	FILTER_SANITIZE_STRING);
	$second_name = filter_var(trim($_POST['second_name']),
	FILTER_SANITIZE_STRING);
	$email = filter_var(trim($_POST['email']),
	FILTER_SANITIZE_STRING);
	$organization = filter_var(trim($_POST['organization']),
	FILTER_SANITIZE_STRING);
	$pass1 = filter_var(trim($_POST['pass1']),
	FILTER_SANITIZE_STRING);
	$pass2 = filter_var(trim($_POST['pass2']),
	FILTER_SANITIZE_STRING);
	
	
	if(strcasecmp($pass1, $pass2) != 0) {
		echo "Пароли не совпадают";
		exit();
	}
	
	$pass1 = md5($pass1."ivan");
	
	$mysql = new mysqli('localhost','root','root','auth');
	$mysql->query("INSERT INTO `USERS` (`name`, `second_name`, `email`, `organization`, `pass`)
	VALUES('$name', '$second_name', '$email', '$organization', '$pass1')");
	$mysql->close();
	header('Location: /');
?>