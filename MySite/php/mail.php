<?php
 	session_start();

 	$data_flag = false;
 	$err_name = false;
 	$err_street = false;
 	$err_home = false;
 	$err_email = false;

 	/*Валидация полей*/
 	if (empty($_POST['name']) || empty($_POST['street']) || empty($_POST['home']) || empty($_POST['email'])) { //проверка полей на пустоту
		$data_flag = true;
	}
	if (!preg_match("/^[а-я]+$/iu",$_POST['name']) || mb_strlen($_POST['name']) < 2 || mb_strlen($_POST['name']) > 12) {
  		$err_name = true;
	}
	if (!preg_match("/^[а-я]+$/iu",$_POST['street']) || mb_strlen($_POST['street']) < 2 || mb_strlen($_POST['street']) > 35) {
  		$err_street = true;
	}
	if (!preg_match("/[0-9]{1,3}[0-9абвгде\/]{1,4}/i",$_POST['home']) || mb_strlen($_POST['home']) < 0 || mb_strlen($_POST['home']) > 6) {
  		$err_home = true;
	}
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || mb_strlen($_POST['email']) < 10 || mb_strlen($_POST['email']) > 60) {
 		$err_email = true;
	}

	if ($data_flag == true) {
		$_SESSION['message'] = 'Не все данные заполнены'; 
		header('Location: ../pageFeedback.php');
	}
	elseif ($err_name == true) {
		$_SESSION['message'] = 'Некорректное имя'; 
		header('Location: ../pageFeedback.php');
	}
	elseif ($err_street == true) {
		$_SESSION['message'] = 'Некорректное название улицы'; 
		header('Location: ../pageFeedback.php');
	}
	elseif ($err_home == true) {
		$_SESSION['message'] = 'Некорректный номер дома'; 
		header('Location: ../pageFeedback.php');
	}
	elseif ($err_email == true) {
		$_SESSION['message'] = 'Некорректный email'; 
		header('Location: ../pageFeedback.php');
	}
	else {
		/*Если всё хорошо, то отпарвляем письмо*/
		$to = "lukyanow_2011@mail.ru"; // емайл получателя данных из формы
		$theme = "Заявка на подключение"; // тема полученного емайла
		$message =  "Имя: ".$_POST['name']."<br>";//присвоить переменной значение, полученное из формы name=name
		$message .= "Улица: ".$_POST['street']."<br>";
		$message .= "Дом: ".$_POST['home']."<br>";
		$message .= "Почта: ".$_POST['email']."<br>";
		$headers  = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
		mail($to, $theme, $message, $headers); //отправляет получателю на емайл значения переменных
        $_SESSION['message'] = 'Заявка отправлена';
		header('Location: ../index.php');
	}
?>