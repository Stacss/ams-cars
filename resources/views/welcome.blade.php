<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>cars</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap">


</head>
<body>
<header>
    <img src="img/logo.svg" alt="logo">
    <p>Выберите автомобиль</p>
</header>
<div class="container">
    <div class="row">
        <div class="left-menu">

        </div>
        <div class="items-box">
            <div id="app">
                <car-selector></car-selector>
            </div>
        </div>
    </div>

</div>

</body>
</html>
