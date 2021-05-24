<?php
	session_start(); //запуск сессии для переменной $_SESSION
	require_once 'connect.php'; //установка соединения

	$data_flag = false;
	$password_flag = false;
	$err_name = false;
	$err_email = false;
	$err_pass = false;
	$err_login = false;
	$err_coincid = false;

	if (empty($_POST['full_name']) || empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password'])) { //проверка полей на пустоту
		$data_flag = true;
	}
	else {
		$full_name = test_input($_POST['full_name']);
		$login = test_input($_POST['login']);
		$email = test_input($_POST['email']);
		$password = test_input($_POST['password']);
		$confirm_password = test_input($_POST['confirm_password']);
	}

	//Проверка на совпадение пароля
	if ($password !== $confirm_password) {
		$password_flag = true;
	}
	//Провека на совпадение логина
	$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
  	if (mysqli_num_rows($check_login) > 0) {
	  	$err_coincid = true;
	}

	/*Валидация полей*/
	if (!preg_match("/^[а-я]+$/iu",$full_name) || mb_strlen($full_name) < 2 || mb_strlen($full_name) > 12) {
  		$err_name = true;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) < 10 || mb_strlen($email) > 60) {
 		$err_email = true;
	}
	if (!preg_match("#[a-zA-Z]+#", $password) || !preg_match("#[0-9]+#", $password) || mb_strlen($password) < 5) {
		$err_pass = true;
	}
	if (!preg_match("#[a-zA-Z]+#", $login) || mb_strlen($login) < 2 || mb_strlen($login) > 30) {
		$err_login = true;
	}

	/*Проверка ошибок в полях*/
	if ($data_flag == true) {
		$_SESSION['message'] = 'Не все данные заполнены'; 
		header('Location: ../pageRegister.php');
	}
	elseif ($password_flag == true) {
		$_SESSION['message'] = 'Пароли не совпадают'; //Глобальная переменная для хранения сообщения
		header('Location: ../pageRegister.php');
	}
	elseif ($err_name == true) {
		$_SESSION['message'] = 'Некорректное имя'; //Глобальная переменная для хранения сообщения
		header('Location: ../pageRegister.php');
	}
	elseif ($err_email == true) {
		$_SESSION['message'] = 'Некорректный email'; //Глобальная переменная для хранения сообщения
		header('Location: ../pageRegister.php');
	}
	elseif ($err_pass == true) {
		$_SESSION['message'] = 'Пароль должен содержать латинские символы и хотя бы одну цифру'; //Глобальная переменная для хранения сообщения
		header('Location: ../pageRegister.php');
	}
	elseif ($err_login == true) {
		$_SESSION['message'] = 'Логин должен быть не короче двух латинских символов'; //Глобальная переменная для хранения сообщения
		header('Location: ../pageRegister.php');
	}
	elseif ($err_coincid == true) {
		$_SESSION['message'] = 'Такой логин уже есть'; //Глобальная переменная для хранения сообщения
		header('Location: ../pageRegister.php');
	}
	else {
		confirm_register($connect, $full_name, $login, $email, $password);
	}

	/*Функция при успешной регистрации*/
	function confirm_register($connect, $full_name, $login, $email, $password) {
		$password = md5($password);//шифровка пароля
		$query = mysqli_prepare ($connect, "INSERT INTO `users` (`id`, `full-name`, `login`, `email`, `password`, `permission`) VALUES (NULL, ?, ?, ?, ?, 'user')"); //вставка данных в бд
		/*Защита от инъекций*/
		mysqli_stmt_bind_param($query, 'ssss', $full_name, $login, $email, $password);
		mysqli_stmt_execute($query);//отправляет запрос на выполнение

		$_SESSION['message'] = 'Регистрация прошла успешно';
		header('Location: ../pageLogin.php');
	}

	function test_input($data) {
	  $data = trim($data); //удаляет лишние пробелы и табуляции
	  $data = stripslashes($data); //удаление косой черты
	  $data = htmlspecialchars($data); //преобразование в html
	  return $data;
	}
?>