<?php
$db_host = "127.0.0.1"; //Адрес
$db_user = "root"; // логин
$db_password = ""; // пароль
$db_database = "saveOrder"; //название базы данных

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_database); // инициируем вход в базу данных
if ($mysqli->connect_error) {
    printf("Соединение не удалось: %s\n", $mysqli->connect_error); //если не удалось подключиться 
    exit();
}


if ($_GET['submit']) {
    $name = sanitizeString($_GET['name']);
    $mail = sanitizeString($_GET['mail']);
    $num = sanitizeString($_GET['num']);
    $description = sanitizeString($_GET['description']);
    $service = sanitizeString($_GET['service']);
    $rate = sanitizeString($_GET['rate']);
    $duration = sanitizeString($_GET['duration']);
    $cost = sanitizeString($_GET['cost']);


    $sql = "INSERT INTO `orders`(`name`, mail, num, `description`, `service`, rate, duration, cost) VALUES 
    (
    '" . mysqli_real_escape_string($mysqli, $name) . "',
    '" . mysqli_real_escape_string($mysqli, $mail) . "',
    '" . mysqli_real_escape_string($mysqli, $num) . "',
    '" . mysqli_real_escape_string($mysqli, $description) . "',
    '" . mysqli_real_escape_string($mysqli, $service) . "',
    '" . mysqli_real_escape_string($mysqli, $rate) . "',
    '" . mysqli_real_escape_string($mysqli, $duration) . "',
    '" . mysqli_real_escape_string($mysqli, $cost) . "'
)";

    $mysqli->query($sql);

    echo "!!!";
}


























function sanitizeString($str)
{
    $str = stripslashes($str);
    $str = strip_tags($str);
    $str = htmlentities($str);
    return $str;
}
