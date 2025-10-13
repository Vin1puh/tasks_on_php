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
<main>
    <?php
    function minRec($arr, $N) {
        if ($N <= 0) {
            return -1;
        }

        $minIndex = 0;
        $minValue = $arr[0];

        for ($i = 1; $i < $N; $i++) {
            if ($arr[$i] < $minValue) {
                $minValue = $arr[$i];
                $minIndex = $i;
            }
        }

        return $minIndex;
    }
    function findMinElements($A, $B, $C, $NA, $NB, $NC) {
        $result = [];
        $minIndexA = minRec($A, $NA);
        if ($minIndexA != -1) {
            $result['min_A'] = $A[$minIndexA];
            $result['min_index_A'] = $minIndexA;
        }

        $minIndexB = minRec($B, $NB);
        if ($minIndexB != -1) {
            $result['min_B'] = $B[$minIndexB];
            $result['min_index_B'] = $minIndexB;
        }

        $minIndexC = minRec($C, $NC);
        if ($minIndexC != -1) {
            $result['min_C'] = $C[$minIndexC];
            $result['min_index_C'] = $minIndexC;
        }

        return $result;
    }

    $A = [3.5, 1.2, 4.7, 2.1, 0.8];
    $B = [5.6, 2.3, 1.1, 7.8, 4.4];
    $C = [9.1, 6.3, 3.7, 8.2, 5.9];

    $NA = count($A);
    $NB = count($B);
    $NC = count($C);

    $minElements = findMinElements($A, $B, $C, $NA, $NB, $NC);

    echo "<p>"."Массив A: " . implode(', ', $A) . "</p>". "\n";
    echo "<p>"."Минимальный элемент A: " . $minElements['min_A'] . " (индекс: " . $minElements['min_index_A'] . ")\n\n"."</p>";

    echo "<p>"."Массив B: " . implode(', ', $B) ."</p>". "\n";
    echo "<p>"."Минимальный элемент B: " . $minElements['min_B'] . " (индекс: " . $minElements['min_index_B'] . ")\n\n"."</p>";

    echo "<p>"."Массив C: " . implode(', ', $C) ."</p>". "\n";
    echo "<p>"."Минимальный элемент C: " . $minElements['min_C'] . " (индекс: " . $minElements['min_index_C'] . ")\n\n"."</p>";
    ?>
</main>
</body>
</html>
