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
    <p>Список автомобилей, снятые с производства на сентябрь 2010 года. В формате Марка, Модель, Дата снятия с производства.</p>
</header>
<div class="container">
    <div id="app">
        <get-car-data-selector></get-car-data-selector>
    </div>
</div>
</body>
</html>
