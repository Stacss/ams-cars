<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Получение данных</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap">


</head>
<body>
<header>
    <img src="img/logo.svg" alt="logo">
    <p>Список автомобилей и работ, которые не сняты с производства на текущий момент, где стоимость выше 1000 рублей. В формате Марка, Модель, Наименование работ, Стоимость работ.
    </p>
</header>
<div class="container">
    <div id="app">
        <get-new-car></get-new-car>
    </div>
</div>
</body>
</html>
