<?php
session_start();

if (isset($_POST['logout'])) {
    setcookie("auth_key", "", time() - 360000, "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
if (isset($_POST['logins'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if (!empty($login) && !empty($password) && !empty($email) &&
            strlen($login) >= 3 &&
            strlen($password) >= 4 &&
            strpos($email, '@') !== false) {
        setcookie("auth_key", "yes", time() + 360000, "/");
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
$is_logged_in = isset($_COOKIE['auth_key']) && $_COOKIE['auth_key'] === 'yes';

//================================================================================//
function getUserID() {
    if (isset($_COOKIE['auth_key']) && $_COOKIE['auth_key'] === 'yes') {
        return isset($_POST['login']) ? $_POST['login'] : 'user_' . substr(md5($_COOKIE['auth_key']), 0, 8);
    } else {
        if (!isset($_SESSION['guest_id'])) {
            $_SESSION['guest_id'] = 'guest_' . uniqid();
        }
        return $_SESSION['guest_id'];
    }
}
function updateStats() {
    $user_id = getUserID();
    $today = date('Y-m-d');
    $week = date('Y-W');

    $stats_file = 'visit_stats.txt';
    $stats = [];

    if (file_exists($stats_file)) {
        $stats = json_decode(file_get_contents($stats_file), true);
    }

    if (!isset($stats['today'][$today])) {
        $stats['today'][$today] = [];
    }

    if (!in_array($user_id, $stats['today'][$today])) {
        $stats['today'][$today][] = $user_id;
    }

    if (!isset($stats['week'][$week])) {
        $stats['week'][$week] = [];
    }

    if (!in_array($user_id, $stats['week'][$week])) {
        $stats['week'][$week][] = $user_id;
    }

    file_put_contents($stats_file, json_encode($stats));

    return $stats;
}
function showStats() {
    $stats_file = 'visit_stats.txt';

    if (!file_exists($stats_file)) {
        return ['today' => 0, 'week' => 0];
    }

    $stats = json_decode(file_get_contents($stats_file), true);
    $today = date('Y-m-d');
    $week = date('Y-W');

    $today_count = isset($stats['today'][$today]) ? count($stats['today'][$today]) : 0;
    $week_count = isset($stats['week'][$week]) ? count($stats['week'][$week]) : 0;

    return [
            'today' => $today_count,
            'week' => $week_count
    ];
}
$stats = updateStats();
$current_stats = showStats();

?>
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
    <section>
        <form action="" method="post">
            <p>Пользователь вводит названия городов через пробел. Переставьте названия так, чтобы названия были упорядочены по алфавиту.</p>
            <input type="text" class="input" name="city">
            <input type="submit" class="submit" name="send_city" value="Упорядочить">
        </form>
        <?php
            if(isset($_POST['send_city'])) {
                $city = $_POST['city'];
                $arr = explode(' ', $city);
                sort($arr);
                foreach($arr as $sort) {
                    echo '<p>'.$sort.'</p>';
                }
            }
        ?>
    </section>
    <section>
        <?php if ($is_logged_in): ?>
        <h2>Вы вошли в систему!</h2>
        <p>При обновлении страницы вы будете видеть кнопку выход на протижении часа</p>
        <form method="POST">
            <button type="submit" name="logout" class="submit" style="background: red">Выход</button>
        </form>
        <?php else: ?>
        <h2>Вход в систему</h2>
        <form method="POST">
            <input type="text" name="login" placeholder="Логин (минимум 3 символа)" class="input" required>
            <input type="password" name="password" placeholder="Пароль (минимум 4 символа)" class="input" required>
            <input type="email" name="email" placeholder="Email (должен содержать @)" class="input" required>
            <button type="submit" name="logins" class="submit">Войти</button>
        </form>
        <?php endif; ?>
    </section>
    <section>
        <p>📊 Статистика посещений</p>
        <div>
            <p>Сегодня:</p>
            <p><?php echo $current_stats['today']; ?> уникальных посетителей</p>
        </div>
        <div>
            <p>За неделю:</p>
            <p><?php echo $current_stats['week']; ?> уникальных посетителей</p>
        </div>
    </section>
</main>
</body>
</html>
