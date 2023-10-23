<?php


include_once '../php/data_base.php';

$sql = "SELECT * FROM orders WHERE id=" . $_GET['id'];
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));;
$result = $result->fetch_assoc() or die(mysqli_error($mysqli));;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/form.css">
</head>

<body>
    <main class="container">
        <h1 class="page-title">Ваш чек</h1>

        <div class="cheque">
            <h2>Результат</h2>
            <hr>

            <p class="elemResult">ФИО клиента:
            </p>
            <span><?php echo $result['name'] ?></span>
            <p class="elemResult">E-mail:
            </p>
            <span><?php echo $result['mail'] ?></span>
            <p class="elemResult">Номер телефона:
            </p>
            <span><?php echo $result['num'] ?></span>
            <p class="elemResult">Вид деятельности:</p>
            <p><?php echo $result['description'] ?></p>
            <p class="elemResult">Услуга:
            </p>
            <span><?php echo $result['service'] ?></span>
            <?php
            if ($result['rate'] !== '') {
            ?>
                <p class="elemResult">Тариф:
                </p>
                <span><?php echo $result['rate'] ?></span>
            <?php
            }
            ?>
            <p class="elemResult">Длительность:
            </p>
            <span><?php echo $result['duration'] ?></span>
            <p class="elemResult">К оплате:
            </p>
            <span><?php echo $result['cost'] ?></span>

        </div>
    </main>
</body>

</html>