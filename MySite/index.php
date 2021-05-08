<?php
	session_start();
	$count = 0;
	if (isset($_COOKIE['count'])) {
	  $count = $_COOKIE['count'];
	  $count++;
	}
	setcookie('count', $count);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Wirepoint</title>
	<meta charset="utf-8">
	<meta name="viewport" content="user-scalable=yes, width=divece-width, initial-scale=1.0,maximum-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
					if ($_SESSION['user']['permission'] == 'admin') {
	        			echo '<li><a href="php/adminPanel.php">Админка</a></li>';
	        			echo '<li>Просмотров страницы:'.$count.'</li>';
	        		}
	        	?>

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
						Ваш провайдер высокосростного интернета.
					</h2>
					<p>
						Когда ваше соединение - это всё.
					</p>
					<a href="pageInternetHome.php" class="btn-start">Начать</a>
				</div>
			</div>
			<div class="banner-img">
				<div class="banner-container">
					<img src="img\main-banner.png">
				</div>
			</div>
		</div>
	</header>

	<main>
		<div class="small-container">
			<div class="advant-block">
				<div class="column">
					<div class="card">
						<i class="fas fa-wifi fa-2x"></i>
					</div>
					<div class="text-block">
						<p class="bold-text">
							Устройчивое соедение
						</p>
						<p>
							Когда готовы вы
						</p>
					</div>
				</div>

				<div class="column">
					<div class="card">
						<i class="fas fa-chart-line fa-2x"></i>
					</div>
					<div class="text-block">
						<p class="bold-text">
							Нет ограничений на объём данных или использование
						</p>
						<p class="aligment">
							Подключите столько, сколько хочешь и когда хочешь
						</p>
					</div>
				</div>

				<div class="column">
					<div class="card">
						<i class="fas fa-ban fa-2x"></i>
					</div>
					<div class="text-block">
						<p class="bold-text">
							Простая цена
						</p>
						<p>
							Получите низкую цену на Интернет-услуги
						</p>
					</div>
				</div>

				<div class="column">
					<div class="card">
						<i class="fas fa-wrench fa-2x"></i>
					</div>
					<div class="text-block">
						<p class="bold-text">
							Безлимитная поддержка
						</p>
						<p class="aligment">
							Мы здесь, чтобы помочь 365 дней в году
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="big-container">
			<div class="big-block">
				<div class="left-content">
					<div class="text-container">
						<h2>
							Соберите всё, что любите
						</h2>
						<p>
							Добавьте WIREPOINT TV в свой тарифный план Интернета, чтобы получить высокоскоростное соединение, чтобы вместе смотреть все ваши любимые развлечения в одном месте, в том числе: прямые телепередачи и спортивные состязания, названия по запросу, записи облачного цифрового видеорегистратора и доступ к HBO, Netflix, Pandora и многим другим.
						</p>
						<a href="pageTV.php" class="btn-start">Подключить TV</a>
					</div>
				</div>

				<div class="right-content">
					<div class="banner-container">
						<img src="img\img-content(TV).png">
					</div>
				</div>
			</div>
		</div>
	<div class="small-container">
			<div class="small-block">
				<h3>
					Наслаждайтесь более высокой скоростью с Интернетом WIREPOINT
				</h3>
				<p>
					WIREPOINT обеспечивает более быстрое подключение к Интернету. Загружайте документы быстрее, чем когда-либо. Смотрите фильмы в потоковом режиме, не беспокоясь о буферизации. Видео-чат по всему дому. Всё это происходит с WIREPOINT, поключение к Интернету, которому можно доверять.
				</p>
			</div>
		</div>
	
		<div class="big-container">
			<div class="big-block">
				<div class="left-content">
					<div class="text-container">
						<h2>
							Мобильный интернет на 4G+ скоростях
						</h2>
						<p>
							Оставайтесь на связи в соц сетях, работайте, играйте в любимые игры, ищите информацию, делитесь впечатлениями с друзьями. Поможем вам подобрать оптимальный вариант, чтобы хватило на всё и не пришлось переплачивать.
						</p>
						<a href="pageInternetPhone.php" class="btn-start">Подлючить мобильный интернет</a>
					</div>
				</div>

				<div class="right-content">
					<div class="banner-container">
						<img src="img\img-content(phone).png">
					</div>
				</div>
			</div>
		</div>
	
		<div class="small-container">
			<div class="small-block">
				<h3>
					Выберите WIREPOINT для Интеренета, на который вы можете рассчитывать
				</h3>
				<p>
					Ваш дом настолько же умный, насколько и ваш интеренет. Получите надежный и умный Wi-Fi во всё доме с WIREPOINT. Выберите тарифный план для подключение к Интернету, соответствующий вашим потребностям, и будьте уверены в надёжности соединения.
				</p>
			</div>
		</div>
		
		<div class="big-container">
			<div class="big-block">
				<div class="left-content">
					<div class="text-container">
						<h2>
							Прямая связь
						</h2>
						<p>
							Надёжный Интернет хорощ только при наличии сильного соеденинения. Наслаждайтесь безопасной и надёжной беспроводной домашней сетью и подключением к нескольким устройствам с помощью шлюза Wi-Fi WIREPOINT. Делайте больше с помощью постоянного подключения к Интернету от WIREPOINT.
						</p>
						<a href="pageInternetHome.php" class="btn-start">Подключить домашний интернет</a>
					</div>
				</div>

				<div class="right-content">
					<div class="banner-container">
						<img src="img\img-content(router).png">
					</div>
				</div>
			</div>
		</div>
		
		<div class="small-container">
			<div class="small-block">
				<h3>
					Готовы к сервису WIREPOINT?
				</h3>
				<p>
					Позвоните сейчас 8-800-85-35-35
				</p>
				<a href="pageFeedback.php" class="btn-start">Оставить заявку</a>
			</div>
		</div>

		<div class="questions">
			<div class="last-container">
				<h2>
						Часто задаваемые вопросы
				</h2>
				<div class="quest-container">
					<input type="checkbox" id="hd-1" class="hide"/>
		   			<label for="hd-1">Доступен ли Интернет WIREPOINT в моём районе?</label>
					<div class="annotation">
							Чтобы узнать о доступности интернета в вашем районе, необходимо связаться с оператором по телефону и назвать адрес проживания.
					</div>
					<br>

					<input type="checkbox" id="hd-2" class="hide"/>
		   			<label for="hd-2">Почему я должен выбрать WIREPOINT TV в качестве своей телевизионной услуги?</label>
					<div class="annotation">
							Наши телевизионные услуги самые качественные, всегда стабильный и чистый сигнал. В этом Вы можете убедиться самостоятельно.
					</div>
					<br>

					<input type="checkbox" id="hd-3" class="hide"/>
		   			<label for="hd-3">Почему я должен выбрать Интернет от WIREPOINT?</label>
					<div class="annotation">
							Скорость нашего интернета самая большая в городе, всегда стабильное подлючение, круглосуточная поддержка.
					</div>
					<br>

					<input type="checkbox" id="hd-4" class="hide"/>
		   			<label for="hd-4">Как узнать баланс?</label>
					<div class="annotation">
							Чтобы узнать баланс, необходимо зайти в личном кабинете в раздел "Баланс".
					</div>
					<br>

					<input type="checkbox" id="hd-5" class="hide"/>
		   			<label for="hd-5">Как пополнить счёт?</label>
					<div class="annotation">
							Чтобы пополнить счёт, необходимо перевести на него деньги.
					</div>
					<br>

					<input type="checkbox" id="hd-6" class="hide"/>
		   			<label for="hd-6">Как узнать, когда вносить денежные средства на счёт?</label>
					<div class="annotation">
							Это узнать очень просто! Если на балансе 0 рублей, то необходимо пополнить его денежными средствами.
					</div>
					<br>

					<input type="checkbox" id="hd-7" class="hide"/>
		   			<label for="hd-7">Что делать, если неожиданно закончились деньги на счёте?</label>
					<div class="annotation">
							Если деньги вдруг закончились, то необходимо пополнить баланс денежными средствами.
					</div>
					<br>

					<input type="checkbox" id="hd-8" class="hide"/>
		   			<label for="hd-8">Что делать, если платёж не поступил на счёт или был отправлен не туда?</label>
					<div class="annotation">
							Главное не расстраиваться и в следующий раз перед пополнением баланса всё внимательно проверить.
					</div>
					<br>
				</div>
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