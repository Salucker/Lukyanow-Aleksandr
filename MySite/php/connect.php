<?php
    $connect = mysqli_connect('localhost', 'mysql', 'mysql', 'bd');

    if (!$connect) {
        die('Не удалось соединиться с базой данных');
    }
?>