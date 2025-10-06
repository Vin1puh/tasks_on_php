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
$matrix = array(
        array(1, 2, 3),
        array(4, 5, 6),
        array(7, 8, 9)
);

$max_value = 0;
$found = false;

for($j = 0; $j < count($matrix[0]); $j++) {
    $column = array();

    for($i = 0; $i < count($matrix); $i++) {
        $column[] = $matrix[$i][$j];
    }

    $sorted_asc = $column;
    $sorted_desc = $column;
    sort($sorted_asc);
    rsort($sorted_desc);

    if($column === $sorted_asc || $column === $sorted_desc) {
        $column_max = max($column);
        if($column_max > $max_value) {
            $max_value = $column_max;
            $found = true;
        }
    }
}

if($found) {
    echo '<h1>Максимальный элемент: '.$max_value.'</h1>';
} else {
    echo '<h1>0</h1>';
}
?>
</body>
</html>