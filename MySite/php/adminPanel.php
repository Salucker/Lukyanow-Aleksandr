<?php
	session_start();
	if ($_SESSION['user']['permission'] !== 'admin') {
		header('Location: ../pageLogin.php');
	}

	include('outputLetters.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Админка</title>
	<meta charset="utf-8">
</head>
<body>
	<form  <?php if (isset($_GET["id"])) {echo 'action="editData.php?id='.$_GET['id'].'"';} else {echo 'action="sendData.php"';}?> method="POST">
		<h1>Для домашнего интернета</h1>
		<label>Заголовок</label><br>
		<input type="text" name="title" value="<?php echo $title; ?>">
		<br>
		<label>Скорость</label><br>
		<input type="text" name="speed" value="<?php echo $speed; ?>">
		<br>
		<label>Описание</label><br>
		<input type="text" name="description" value="<?php echo $description; ?>">
		<br>
		<label>Цена</label><br>
		<input type="text" name="price" value="<?php echo $price; ?>"><br>
		<input type="submit" value="Добавить" name="edit">
	</form>

	<a href="../pageInternetHome.php">Вернуться</a>
		<?php 
		    if ($_SESSION['message']) {
		        echo '<p class="msg">'.$_SESSION['message'].'</p>';
		    }
		    unset($_SESSION['message']);
	    ?>
	<h1>Письма</h1>
		<?php
			foreach ($letters as $value) {
				?>
				<span>
					Имя: <?php echo $value['name']?><br>
				</span>
				<span>
					Email: <?php echo $value['email']?><br>
				</span>
				<span>
					Сообщение: <?php echo $value['message']?><br><br>
				</span>
				<?php
			}
		?>
</body>
</html>