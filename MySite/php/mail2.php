<?php
 	session_start();
 	require_once 'connect.php';

 	$data_flag = false;
 	$err_name = false;
 	$err_email = false;
 	$err_mess = false;

 	/*Валидация полей*/
 	if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['mess'])) { //проверка полей на пустоту
		$data_flag = true;
	}
	else {
		$name = test_input($_POST['name']);
		$email = test_input($_POST['email']);
		$mess = test_input($_POST['mess']);
	}

	if (!preg_match("/^[а-я]+$/iu", $name) || mb_strlen($name) < 2 || mb_strlen($name) > 12) {
  		$err_name = true;
	}
	if (mb_strlen($mess) < 2 || mb_strlen($mess) > 250) {
  		$err_mess = true;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) < 10 || mb_strlen($email) > 60) {
 		$err_email = true;
	}

	if ($data_flag == true) {
		$_SESSION['message'] = 'Не все данные заполнены'; 
		header('Location: ../pageFeedback2.php');
	}
	elseif ($err_name == true) {
		$_SESSION['message'] = 'Некорректное имя'; 
		header('Location: ../pageFeedback2.php');
	}
	elseif ($err_mess) {
		$_SESSION['message'] = 'Сообщение должно содержать от 2 до 250 символов'; 
		header('Location: ../pageFeedback2.php');
	}
	elseif ($err_email == true) {
		$_SESSION['message'] = 'Некорректный email'; 
		header('Location: ../pageFeedback2.php');
	}
	else {
		/*Если всё хорошо, то отпарвляем письмо*/
		$to = "lukyanow_2011@mail.ru"; // емайл получателя данных из формы
		$theme = "Обращение клиента"; // тема полученного емайла
		$message =  "Имя: ".$name."<br>";//присвоить переменной значение, полученное из формы name=name
		$message .= "Почта: ".$email."<br>";
		$message .= "Сообщение: ".$mess."<br>";
		$headers  = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
		mail($to, $theme, $message, $headers); //отправляет получателю на емайл значения переменных

		confirm_send($connect, $name, $email, $mess);

        $_SESSION['message'] = 'Обращение отправлено';
		header('Location: ../index.php');
	}

	/*Функция для сохранения писем в БД*/
	function confirm_send($connect, $name, $email, $mess) {
		$query = mysqli_prepare ($connect, "INSERT INTO `letter` (`id`, `name`, `email`, `message`) VALUES (NULL, ?, ?, ?)"); //вставка данных в бд
		/*Защита от инъекций*/
		mysqli_stmt_bind_param($query, 'sss', $name, $email, $mess);
		mysqli_stmt_execute($query);//отправляет запрос на выполнение
	}

	function test_input($data) {
	  $data = trim($data); //удаляет лишние пробелы и табуляции
	  $data = stripslashes($data); //удаление косой черты
	  $data = htmlspecialchars($data); //преобразование в html
	  return $data;
	}
?>