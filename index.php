<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/form.css">
    <title>Оформление заказа</title>
</head>

<body>
    <main class="container">

        <h1 class="page-title">Оформление заказа</h1>
        <form id="form" class="form" action="php/saveOrder.php">
            <h2>Данные клиента</h2>
            <hr>

            <div class="input-wrapper">
                <label>ФИО</label>
                <input name="userName" class="text" type="text" required>
            </div>

            <div class=" input-wrapper-two-in-one">
                <div class="input-wrapper">
                    <label>E-mail</label>
                    <input name="userMail" class="text" type="email" title="123" pattern="([A-Za-z0-9]+[.-_])*[A-Za-z0-9]+@[A-Za-z0-9-]+(\.[A-Z|a-z]{2,})+" required maxlength="50">
                </div>

                <div class="input-wrapper">
                    <label>Телефон</label>
                    <input required name="userPhone" class="text tel" type="tel" placeholder="+7(___)___-__-__" maxlength="17">

                </div>
            </div>

            <div class="input-wrapper">
                <label>Вид деятельности</label>
                <textarea name="userDescription" class="text" maxlength="300"></textarea>
            </div>



            <h2>Оформление покупки</h2>
            <hr>
            <div class="services-block">
                <div class="input-wrapper">
                    <label>Услуги</label>
                    <select required name="services" id="servicesInput">
                        <option selected value="" hidden>Выбирите тариф</option>
                        <option value="Рабочее место">Рабочее место</option>
                        <option value="Конференц зал">Конференц зал</option>
                        <option value="Переговорка">Переговорка</option>
                    </select>
                </div>



                <div class="input-wrapper" id="rate">
                    <label>Тариф</label>
                    <select required name="rateSelect">
                        <option value="" selected hidden>Выбирите тариф</option>
                        <option value="Гость">Гость</option>
                        <option value="Резидент">Резидент</option>
                        <option value="Агентство">Агентство</option>
                    </select>
                </div>

                <div class="input-wrapper" id="duration">
                    <div id="chengebleArea">

                    </div>
                </div>

                <h2>Итого:</h2>
                <hr>
                <output class="result-block">
                    <p class="result-text">Выбранная услуга:  </p><span id="serviceResult"></span>
                    <p class="result-text">Продлжительность: </p><span id="durationResult"></span>
                    <p class="result-text">Итоговая стоймость: </p><span id="costResult"></span>
                </output>


                <div class="submit-wrapper">
                    <input id="submitBtn" name="submit" disabled type="submit" value="Оплатить">
                </div>
        </form>
    </div>


    <script src="js/script.js"></script>

</body>

</html>