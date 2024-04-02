<?php  
	$login = filter_var(trim($_POST['login']),
	FILTER_SANITIZE_STRING);

	$pass = filter_var(trim($_POST['pass']),
	FILTER_SANITIZE_STRING);

	if (mb_strlen($login)<5 || mb_strlen($login)>90 ) {
		echo "Dont len login";
		exit();
	}

	$pass = md5($pass."qasdfdsvdscsd1234");

	include ('db.php');

	$res = mysqli_query($link, "SELECT * FROM users WHERE login='$login' AND pass='$pass'");

	$user = mysqli_fetch_assoc($res);

	if ($user==0) {
		
		echo "Don find user";	
		exit();
	}

	// print_r($user);
	// exit;

	setcookie('user', $user['name'], time() + 3600*24,'/');


	header('Location: reg.php');
	exit();

?>
