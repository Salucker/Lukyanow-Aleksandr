<?php
	session_start();
	require_once 'connect.php';

	$title = $_POST['title'];
	$speed = $_POST['speed'];
	$description = $_POST['description'];
	$price = $_POST['price'];

	send($connect, $title, $speed, $description, $price);

	function send($connect, $title, $speed, $description, $price) {
		$query = mysqli_prepare ($connect, "INSERT INTO `homeinternet` (`id`, `title`, `speed`, `description`, `price`) VALUES (NULL, ?, ?, ?, ?)"); //вставка данных в бд
		/*Защита от инъекций*/
		mysqli_stmt_bind_param($query, 'ssss', $title, $speed, $description, $price);
		mysqli_stmt_execute($query);//отправляет запрос на выполнение

		$_SESSION['message'] = 'Данные успешно добавлены';
		header('Location: adminPanel.php');
	}
?>