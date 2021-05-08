<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Админка</title>
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
</body>
</html>