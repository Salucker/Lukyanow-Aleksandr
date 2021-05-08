<?php 
	session_start();
?>

<html>
<head>
	<title>Оставить заявку</title>
	<meta charset="utf-8">
	<meta name="viewport" content="user-scalable=yes, width=divece-width, initial-scale=1.0,maximum-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styleForAutndReg.css">
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
	</header>

	<main>
		<form action="php/mail.php" method="post" style="min-width: 300px;">
	        <label>Улица</label>
	        <input type="text" name="street" placeholder="Введите свою улицу">
	        <label>Дом</label>
	        <input type="text" name="home" placeholder="Введите номер своего дома">
	        <label>Имя</label>
	        <input type="text" name="name" placeholder="Введите свое имя">
	        <label>Email</label>
	        <input type="text" name="email" placeholder="Введите свой Email">
	        <button type="submit" class="login-btn">Отправить</button>

	        <?php 
	        	if ($_SESSION['message']) {
	        		echo '<p class="msg">'.$_SESSION['message'].'</p>';
	        	}
	        	unset($_SESSION['message']); 
	        ?>

    	</form>
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