<?php
	session_start();
	require_once 'connect.php';

	$updateData =  mysqli_query($connect, "UPDATE `users` SET `tarrif` = ".$_GET['id']." WHERE `users`.`id` = ".$_SESSION['user']['id']);
	header('Location: ../pagePerson.php');
?>