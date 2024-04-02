<?php
	$login = filter_var(trim($_POST['login']),
	FILTER_SANITIZE_STRING);

	$name = filter_var(trim($_POST['name']),
	FILTER_SANITIZE_STRING);

	$pass = filter_var(trim($_POST['pass']),
	FILTER_SANITIZE_STRING);

	if (mb_strlen($login)<5 || mb_strlen($login)>90 ) {
		echo "Dont len login";
		exit();
	}


	else if (mb_strlen($name)<3 || mb_strlen($login)>50 ) {
		echo "Dont len name";
		exit();
	}


	else if (mb_strlen($pass)<2 || mb_strlen($pass)>20 ) {
		echo "Dont len pass";
		exit();
	}

	$pass = md5($pass."qasdfdsvdscsd1234");

    include ('db.php');

	$result = mysqli_query($link, "INSERT INTO users (login, name, pass) VALUES ('$login', '$name', '$pass')");


	header('Location: login.php');
	exit();
 ?>