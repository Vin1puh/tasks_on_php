<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav>
        <a href="lab1.php">Lab1</a>
        <a href="lab2.php">Lab2</a>
        <a href="lab3.php">Lab3</a>
    </nav>
</header>
<?php
    $LIGHT_YEAR_TO_KM = 9.461 * 10 ** 12; // 1 световой год в км
    $PARSEC_TO_KM = 3.086 * 10 ** 13;     // 1 парсек в км
    $Sirius = 8.14 * 10 ** 12;
    $Arktur = 103 * $PARSEC_TO_KM;
    $Vega = 25 * $LIGHT_YEAR_TO_KM;
    echo '<h1>Сириус находится в '.$Sirius.'Км от солнца</h1>';
    echo '</br>';
    echo '<h1>Арктур находится в '.$Arktur.'Км от солнца</h1>';
    echo '</br>';
    echo '<h1>Вега находится в '.$Vega.'Км от солнца</h1>';
    echo '</br>';
    if($Sirius < $Arktur && $Sirius < $Vega){
        echo '<h1>Сириус близжайшая к солцу звезда</h1>';
    }elseif ($Arktur < $Sirius && $Arktur < $Vega){
        echo '<h1>Арктур близжайшая к солцу звезда</h1>';
    }else{
        echo '<h1>Вега близжайшая к солцу звезда</h1>';

    }
?>
</body>
</html>

