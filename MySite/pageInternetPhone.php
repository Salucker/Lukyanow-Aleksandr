<?php
	session_start();
	if (!$_SESSION['user']) {
		header('Location: pageLogin.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Мобильный интернет</title>
	<meta charset="utf-8">
	<meta name="viewport" content="user-scalable=yes, width=divece-width, initial-scale=1.0,maximum-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styleIOtherGeneralPages.css">
	<link rel="stylesheet" type="text/css" href="css/styleInternetPhone.css">
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
						Мобильный интернет
					</h2>
					<p>
						Быстрый мобильный инетернет на 4G+ скоростях в смартфоне или планшете
					</p>
				</div>
			</div>
			<div class="banner-img">
				<div class="banner-container">
					<img src="img\main-banner-internetMobile.png">
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
							WIREPOINT MOB 2GB
						</p>
					</div>
					<div class="fndn">
						<span>2 ГБ</span>
					</div>
					<div class="descript">
						<p>
							общайтесь онлайн, следите за новостями
						</p>
					</div>
					<div class="fndn">
						<span>250 Р/мес</span>
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
							WIREPOINT MOB 4GB
						</p>
					</div>
					<div class="fndn">
						<span>4 ГБ</span>
					</div>
					<div class="descript">
						<p>
							общайтесь, смотрите видео
						</p>
					</div>
					<div class="fndn">
						<span>400 Р/мес</span>
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
							WIREPOINT MOB 10GB
						</p>
					</div>
					<div class="fndn">
						<span>10 ГБ</span>
					</div>
					<div class="descript">
						<p>
							смотрите сериалы онлайн, общайтесь в соц сетях
						</p>
					</div>
					<div class="fndn">
						<span>600 Р/мес</span>
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