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
<main>
    <section>
        <form action="display.php" method="post">
            <p>Вариант 1: Высшая сложность</p>
            <img src="image/lab1-1.png" alt="">
            <input class="input" type="number" placeholder="введите число" name="t">
            <input class="submit" type="submit" value="Отправить">
        </form>
    </section>
    <section>
        <form action="forSun.php">
            <p>Вариант 29: Срелняя сложность</p>
            <img src="image/lab1-2.png" alt="">
            <input class="submit" type="submit" value="Показать решение">
        </form>
    </section>
    <section>
        <form action="numbers.php" method="post">
            <p>Вариант 7: Высшая сложность</p>
            <img src="image/lab1-3.png" alt="">
            <p>Числа через запятую:</p>
            <input class="input" type="text" name="numbers" value="1,2,3,-4,5,-2,0">
            <input class="submit" type="submit" value="Посчитать">
        </form>
    </section>
</main>
</body>
</html>