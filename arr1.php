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
        <a href="lab4.php">Lab4</a>
    </nav>
</header>
<?php
$input_string = $_POST['array1'];
$original = array_map('intval', explode(' ', $input_string));
$new = array();

for($i = 0; $i < count($original); $i++) {
    $num = $original[$i];
    $sum = 0;

    if($num >= 10 && $num <= 99) {
        $first_digit = floor($num / 10);
        $second_digit = $num % 10;
        $new_num = $second_digit * 10 + $first_digit;
        $new[] = $new_num;
    } else {
        $new[] = $num;
    }
}

echo '<h1>Исходный массив: '.implode(' ', $original).'</h1>';
echo '</br>';
echo '<h1>Новый массив: '.implode(' ', $new).'</h1>';
?>
</body>
</html>