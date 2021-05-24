<?php
	require_once 'connect.php';

	$query = mysqli_query ($connect, "SELECT * FROM `homeinternet`");
	$tariffs = mysqli_fetch_all($query, MYSQLI_ASSOC);//результат sql в массив
?>