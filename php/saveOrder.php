<?php


include_once '../php/data_base.php';


if ($_GET['submit']) {

    if ($_GET['services'] === 'Конференц зал') $_GET['duration'] = $_GET['duration'] . "ч";

    $name = sanitizeString($_GET['userName']);
    $mail = sanitizeString($_GET['userMail']);
    $num = sanitizeString($_GET['userPhone']);
    $description = sanitizeString($_GET['userDescription']);
    $service = sanitizeString($_GET['services']);
    $rate = sanitizeString($_GET['rateSelect']);
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

    $mysqli->query($sql) or die(mysqli_error($mysqli));

    $id = mysqli_insert_id($mysqli) or die(mysqli_error($mysqli));;
}


header("Location: /pages/finish.php?id=$id");



//Функция для защиты БД от 
function sanitizeString($str)
{
    $str = stripslashes($str);
    $str = strip_tags($str);
    $str = htmlentities($str);
    return $str;
}
