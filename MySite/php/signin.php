<?php
	session_start(); 
	require_once 'connect.php';

	$login = htmlspecialchars($_POST['login']);
	$password = htmlspecialchars(md5($_POST['password']));

	$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

	if (mysqli_num_rows($check_user) > 0){ //функция подсчитывает количество совпадений логина и пароля в базе
		$user = mysqli_fetch_assoc($check_user); //данные из бд в виде массива
		
		$_SESSION['user'] = [
			"id" => $user['id'],
			"login" => $user['login'],
			"permission" => $user['permission'],
			"tarrif" => $user['tarrif']
		];
		
		header('Location: ../index.php');

	} else {
		$_SESSION['message'] = 'Неверно введён логин или пароль';
		header('Location: ../pageLogin.php');
	}
?>