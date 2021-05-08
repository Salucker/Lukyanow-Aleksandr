<?php
	session_start();
	require_once 'connect.php';

	$include = mysqli_prepare($connect, "SELECT * FROM `homeinternet` WHERE id = ?");
	mysqli_stmt_bind_param($include, 'd', $_GET['id']);
	mysqli_stmt_execute($include);
	mysqli_stmt_bind_result($include, $id, $title, $speed, $description, $price);
	mysqli_stmt_fetch($include);

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