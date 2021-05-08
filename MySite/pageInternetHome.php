<?php
	session_start();
	if (!$_SESSION['user']) {
		header('Location: pageLogin.php');
	}

	include('php/output.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Домашний интернет</title>
	<meta charset="utf-8">
	<meta name="viewport" content="user-scalable=yes, width=divece-width, initial-scale=1.0,maximum-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styleIOtherGeneralPages.css">
	<link rel="stylesheet" type="text/css" href="css/styleInternetHome.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<style type="text/css">
		.admin-btn {
			color: red;
			text-decoration: none;
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
						Домашний интернет
					</h2>
					<p>
						Стабильное подключение без скачков и перебоев
					</p>
				</div>
			</div>
			<div class="banner-img">
				<div class="banner-container">
					<img src="img\main-banner-internetHome.png">
				</div>
			</div>
		</div>
	</header>

	<main>
		<div class="block-container">
			<?php
				foreach ($tariffs as $value) {
					?>
						<div class="column">
						<div class="text-content">
						<div class="content">
							<p>
								<?php echo $value['title']?>
							</p>
						</div>
						<div class="fndn">
							<span><?php echo $value['speed']?> Мбит/с</span>
						</div>
						<div class="descript">
							<p>
								<?php echo $value['description']?>
							</p>
						</div>
						<div class="fndn">
							<span><?php echo $value['price']?> Р/мес</span>
						</div>
					</div>
					<form action="pageFeedback.php">
					<button class="btn-chose">ВЫБРАТЬ</button>
					</form>
					<?php 
						if ($_SESSION['user']['permission'] == 'admin') {
		        			echo '<a class="admin-btn" href="php/editData.php?id='.$value['id'].'"'.'>Редактировать</a>';
		        			echo '<a class="admin-btn" href="php/deleteData.php?id='.$value['id'].'"'.'>Удалить</a>';
		        		}
	        		?>
				</div>
					<?php
				}
			?>
		</div>
	</main>
	<?php 
		if ($_SESSION['user']['permission'] == 'admin') {
			echo '<a class="admin-btn" href="php/adminPanel.php">Добавить</a>';
		}
	?>
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