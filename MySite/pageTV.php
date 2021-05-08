<?php
	session_start(); //запуск сессии, чтобы была видна переменная $_SESSION
	if (!$_SESSION['user']) {
		header('Location: pageLogin.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Телевидение</title>
	<meta charset="utf-8">
	<meta name="viewport" content="user-scalable=yes, width=divece-width, initial-scale=1.0,maximum-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styleIOtherGeneralPages.css">
	<link rel="stylesheet" type="text/css" href="css/styleTV.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
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
	        		if ($_SESSION['user']) {
	        			echo '<li>'.$_SESSION['user']['login'].'<br><a href="php/logout.php" style="font-size: 0.6em;">Выход</a></li>';
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

		<div class="main-banner">
			<div class="banner-text">
				<div class="text-container">
					<h2>
						Цифровое телевидение
					</h2>
					<p>
						Новинки кино, любимые сериалы, мультфильмы, новости и познавательные передачи - в удобное время с любого устройства
					</p>
				</div>
			</div>
			<div class="banner-img">
				<div class="banner-container">
					<img src="img\main-banner-TV.png">
				</div>
			</div>
		</div>
	</header>

	<main>
		<div class="block-container">
			<div class="column">
				<div class="text-content">
					<div class="content">
						<p>
							WIREPOINT Интернет TV 120+ UHD
						</p>
					</div>
					<div class="fndn">
						<span>143 канала</span>
					</div>
					<div class="descript">
						<p>
							аналоговый сигнал
						</p>
					</div>
					<div class="fndn">
						<span>199 Р/мес</span>
					</div>
				</div>

				<form action="pageFeedback.php">
				<button class="btn-chose">ВЫБРАТЬ</button>
				</form>
			</div>

			<div class="column">
				<div class="text-content">
					<div class="content">
						<p>
							WIREPOINT TV 185+
						</p>
					</div>
					<div class="fndn">
						<span>205 каналов</span>
					</div>
					<div class="descript">
						<p>
							аналоговый сигнал
						</p>
					</div>
					<div class="fndn">
						<span>349 Р/мес</span>
					</div>
				</div>

				<form action="pageFeedback.php">
				<button class="btn-chose">ВЫБРАТЬ</button>
				</form>
			</div>

			<div class="column">
				<div class="text-content">
					<div class="content">
						<p>
							WIREPOINT TV 200+
						</p>
					</div>
					<div class="fndn">
						<span>225 каналов</span>
					</div>
					<div class="descript">
						<p>
							цифровой сигнал
						</p>
					</div>
					<div class="fndn">
						<span>479 Р/мес</span>
					</div>
				</div>

				<form action="pageFeedback.php">
				<button class="btn-chose">ВЫБРАТЬ</button>
				</form>
			</div>

			<div class="column">
				<div class="text-content">
					<div class="content">
						<p>
							WIREPOINT TV 230+
						</p>
					</div>
					<div class="fndn">
						<span>257 каналов</span>
					</div>
					<div class="descript">
						<p>
							цифровой сигнал
						</p>
					</div>
					<div class="fndn">
						<span>949 Р/мес</span>
					</div>
				</div>

				<form action="pageFeedback.php">
				<button class="btn-chose">ВЫБРАТЬ</button>
				</form>
			</div>
		</div>
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
</body>
</html>