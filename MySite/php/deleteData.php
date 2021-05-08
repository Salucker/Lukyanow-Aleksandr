<?php
	require_once 'connect.php';

	$id = htmlspecialchars($_GET["id"]);

	function deleteNews($connect, $id) {
			$res = mysqli_prepare($connect,"DELETE FROM `homeinternet` WHERE id = ?");
			mysqli_stmt_bind_param($res, 'd', $id);
			mysqli_stmt_execute($res);
	}

	deleteNews($connect, $id);

	header('Location: ../pageInternetHome.php');
?>