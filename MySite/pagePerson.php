<?php
	session_start();
	require_once 'php/connect.php';
	if (!$_SESSION['user']) {
		header('Location: index.php');
	}

	$inquiry = mysqli_query($connect, "SELECT *FROM `users` INNER JOIN `homeinternet` ON `users`.`tarrif` = `homeinternet`.`id` WHERE `users`.`id` = ". $_SESSION['user']['id']);
	$info = mysqli_fetch_assoc($inquiry);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Войти</title>
	<meta charset="utf-8">
	<meta name="viewport" content="user-scalable=yes, width=divece-width, initial-scale=1.0,maximum-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styleForAutndReg.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<style type="text/css">
	main {
		flex-direction: column;
	}
</style>
</head>
<body>

	<header>
		<nav>
			<div class="logo">
				<img src="img\logo.png">
			</div>
			<ul class="nav-menu">
				<li><a href="index.php">Главная</a></li>
				<li><a href="pageInternetHome.php">Интернет</a></li>
				<li><a href="pageTV.php">Телевидение</a></li>
				<li><a href="pageInternetPhone.php">Мобильный интернет</a></li>
				<?php 
					if ($_SESSION['user']['permission'] == 'admin') {
	        			echo '<li><a href="php/adminPanel.php">Админка</a></li>';
	        			echo '<li>Просмотров страницы:'.$count.'</li>';
	        		}
	        	?>

				<?php 
	        		if ($_SESSION['user']) {
	        			echo '<li><a href="pagePerson.php">'.$_SESSION['user']['login'].'</a><br><a href="php/logout.php" style="font-size: 0.6em;">Выход</a></li>';
	        		}
	        		
	        		else {
	        			echo '<li><a href="pageLogin.php">Войти</a></li>';
	        		} 
	        	?>
			</ul>

			<div class="burger-section">
				<a href="#" class="menu-btn">
					<span></span>
				</a>
			</div>
		</nav>
	</header>
	<main>
	        <h2><?php echo $_SESSION['user']['login'] ?></h2>
	        <span>Тариф: <?php echo $info['title'] ?></span>
	        <a href="php/destroyTarrif.php?id=<?= $value['id']?>">
				<button class="btn-chose">Отключить тариф</button>
			</a>
	</main>
	<footer>
			<div class="foot-container">
				<div class="logo">
					<img src="img\logo.png">
				</div>

				<div class="copiright">
					<span>Все права защищены</span>
					<span>&copywirepoint2021</span>
				</div>
			</div>
		</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="js\script.js"></script>