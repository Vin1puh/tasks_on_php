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
<main>
    <header>
        <nav>
            <a href="lab1.php">Lab1</a>
            <a href="lab2.php">Lab2</a>
            <a href="lab3.php">Lab3</a>
        </nav>
    </header>
    <?php
    function createArrayFromDiagonalMax($matrix) {
        $n = count($matrix);
        $result = array();

        for ($i = 0; $i < $n; $i++) {
            $maxElement = $matrix[$i][$i];

            for ($j = 0; $j < $n; $j++) {
                if ($matrix[$j][$i] > $maxElement) {
                    $maxElement = $matrix[$j][$i];
                }
            }

            $result[] = $maxElement;
        }

        return $result;
    }

    function createArrayFromDiagonalMaxAlternative($matrix) {
        $n = count($matrix);
        $result = array();

        for ($i = 0; $i < $n; $i++) {
            $maxInColumn = $matrix[0][$i];

            for ($j = 0; $j < $n; $j++) {
                if ($matrix[$j][$i] > $maxInColumn) {
                    $maxInColumn = $matrix[$j][$i];
                }
            }

            $result[] = $maxInColumn;
        }

        return $result;
    }

    $matrix5x5 = array(
            array(12,  5,  8,  3, 15),
            array( 7, 25,  9,  4,  6),
            array(18,  2, 30, 11,  1),
            array( 5, 14,  7, 35, 10),
            array(20,  8, 13,  6, 40)
    );

    echo '<p>'."Исходная матрица 5x5:\n".'</p>';
    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 5; $j++) {
            echo sprintf("%3d", $matrix5x5[$i][$j]) . " ";
        }
        echo "</br>";
    }

    echo '<p>'."\nГлавная диагональ: ".'</p>';
    for ($i = 0; $i < 5; $i++) {
        echo $matrix5x5[$i][$i] . " ";
    }
    echo "\n";

    $resultArray = createArrayFromDiagonalMax($matrix5x5);

    echo '<p>'."\nРезультирующий массив (максимальные элементы на главной диагонали):\n".'</p>';
    echo '<p>'."[" . implode(", ", $resultArray) . "]\n".'</p>';

    echo '<p>'."\nПодробное объяснение:\n".'</p>';
    for ($i = 0; $i < 5; $i++) {
        $columnElements = array();
        for ($j = 0; $j < 5; $j++) {
            $columnElements[] = $matrix5x5[$j][$i];
        }
        echo '<p>'."Столбец $i: [" . implode(", ", $columnElements) . "] -> max = " . $resultArray[$i] . "\n".'</p>';
    }

    echo '<p>'."\n" . str_repeat("=", 50) . "\n".'</p>';
    echo '<p>'."Тест с вещественными числами:\n".'</p>';

    $realMatrix = array(
            array(1.5, 2.3, 3.7, 4.1, 5.9),
            array(6.2, 7.8, 8.4, 9.6, 10.2),
            array(11.1, 12.5, 13.9, 14.3, 15.7),
            array(16.4, 17.2, 18.8, 19.5, 20.1),
            array(21.9, 22.6, 23.3, 24.7, 25.0)
    );

    echo '<p>'."Матрица вещественных чисел 5x5:\n".'</p>';
    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 5; $j++) {
            echo sprintf("%5.1f", $realMatrix[$i][$j]) . " ";
        }
        echo "</br>";
    }

    $realResultArray = createArrayFromDiagonalMax($realMatrix);
    echo '<p>'."\nРезультирующий массив: [" . implode(", ", $realResultArray) . "]\n".'</p>';

    function generateRandomMatrix($size, $min = 1, $max = 100) {
        $matrix = array();
        for ($i = 0; $i < $size; $i++) {
            $row = array();
            for ($j = 0; $j < $size; $j++) {
                $row[] = rand($min, $max);
            }
            $matrix[] = $row;
        }
        return $matrix;
    }

    echo '<p>'."\n" . str_repeat("=", 50) . "\n".'</p>';
    echo '<p>'."Тест со случайной матрицей 5x5:\n".'</p>';

    $randomMatrix = generateRandomMatrix(5, 10, 99);
    echo "<p>"."Случайная матрица:\n".'</p>';
    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 5; $j++) {
            echo sprintf("%3d", $randomMatrix[$i][$j]) . " ";
        }
        echo "</br>";
    }

    $randomResultArray = createArrayFromDiagonalMax($randomMatrix);
    echo '<p>'."\nРезультирующий массив: [" . implode(", ", $randomResultArray) . "]\n".'</p>';

    ?>
</main>
</body>
</html>