<?php
	session_start(); //запуск сессии, чтобы была видна переменная $_SESSION
?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
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
		<form action="php/signup.php" method="post">
			<label>Имя</label>
	        <input type="text" name="full_name" placeholder="Введите свое имя" id="area">
	        <label>Логин</label>
	        <input type="text" name="login" placeholder="Введите свой логин" id="area2">
	        <label>Почта</label>
	        <input type="text" name="email" placeholder="Введите адрес своей почты">
	        <label>Пароль</label>
	        <input type="password" name="password" placeholder="Введите пароль">
	        <label>Подтверждение пароля</label>
	        <input type="password" name="confirm_password" placeholder="Подтвердите пароль">
	        <button type="submit" class="login-btn">Зарегистрироваться</button>
	        <p>
	            У вас уже есть аккаунт? - <a href="pageLogin.php">авторизируйтесь</a>!
	        </p>

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

		<script>
			  area2.value = localStorage.getItem('area2');
			    area2.oninput = () => {
			      localStorage.setItem('area2', area2.value)
			    }

			    area.value = localStorage.getItem('area');
			    area.oninput = () => {
			      localStorage.setItem('area', area.value)
			    };
		</script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="js\script.js"></script>
</body>
</html>