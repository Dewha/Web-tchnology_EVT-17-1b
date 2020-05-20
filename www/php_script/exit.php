<?php
	setcookie('user', $user['email'], time() - 3600 * 24, "/");
	setcookie('userid', $user['id'], time() - 3600 * 24, "/");
	header('Location: /');
?>
