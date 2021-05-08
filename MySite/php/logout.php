<?php
	session_start();
	unset($_SESSION['user']);
	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: $referer");
?>