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
if (isset($_POST['numbers'])) {
    $numbers = explode(',', $_POST['numbers']);
    $sum = 0;

    foreach ($numbers as $num) {
        if ($num == 0) break;
        if ($num < 0) $sum += $num;
    }

    echo $sum;
}
?>
</body>
</html>
