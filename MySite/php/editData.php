<?php
	session_start();
	require_once 'connect.php';

	$include = mysqli_prepare($connect, "SELECT * FROM `homeinternet` WHERE id = ?");
	mysqli_stmt_bind_param($include, 'd', $_GET['id']); //Привязка переменных к параметрам подготавливаемого запроса
	mysqli_stmt_execute($include); //Выполняет подготовленное утверждение
	mysqli_stmt_bind_result($include, $id, $title, $speed, $description, $price); // Привязка переменных к подготовленному запросу для размещения результата
	mysqli_stmt_fetch($include); //Связывает результаты подготовленного выражения с переменными

	function editNews($connect, $id, $title, $speed, $description, $price){
		$query = mysqli_prepare($connect, "UPDATE `homeinternet` SET title = ?, speed = ?, description = ?, price = ? WHERE id = ?");
		mysqli_stmt_bind_param($query, 'sdsdd', $title, $speed, $description, $price, $id);
		mysqli_stmt_execute($query);
	}

	if(isset($_POST["edit"])) {
			$id = htmlspecialchars($_GET["id"]);
	        editNews($connect, $id, $_POST["title"], $_POST["speed"], $_POST["description"], $_POST["price"]);
	        $_SESSION['message'] = "Успешно изменено";
	}

	include('adminPanel.php');
?>