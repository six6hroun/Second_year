<?php
session_start();

// Проверяем, не заблокирован ли пользователь
if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 3) {
    if (!isset($_SESSION['block_time'])) {
        $_SESSION['block_time'] = time();
    } elseif (time() - $_SESSION['block_time'] < 60) {
        die("Вы исчерпали количество попыток. Попробуйте через " . (60 - (time() - $_SESSION['block_time'])) . " секунд.");
    } else {
        // Сбрасываем блокировку после минуты
        unset($_SESSION['login_attempts']);
        unset($_SESSION['block_time']);
    }
}

// данные были отправлены формой?
if($_POST['Submit']) {
    // проверяем данные на правильность
    if(($_POST['user_name'] == "student") && ($_POST['user_pass'] == "kvt")) {
        // сбрасываем счетчик попыток при успешном входе
        unset($_SESSION['login_attempts']);
        unset($_SESSION['block_time']);
        
        // запоминаем имя пользователя
        $_SESSION['logged_user'] = $_POST['user_name'];
        // и переправляем его на <секретную> страницу...
        header("Location: secretplace.php");
        exit;
    } else {
        // Увеличиваем счетчик неудачных попыток
        $_SESSION['login_attempts'] = isset($_SESSION['login_attempts']) ? $_SESSION['login_attempts'] + 1 : 1;
    }
}

// если что-то было не так, то пользователь получит сообщение об ошибке.
?>
<html>
<head>
    <title>Вводи пароль</title>
    <meta charset="utf-8"/>
</head>
<body>
<?php
if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 3) {
    echo "<p>Вы исчерпали количество попыток. Попробуйте через минуту.</p>";
} else {
    $remaining_attempts = 3 - (isset($_SESSION['login_attempts']) ? $_SESSION['login_attempts'] : 0);
    echo "<p>Вы ввели неверный пароль! Осталось попыток: " . $remaining_attempts . "</p>";
    echo '<a href="index.php">Попробовать снова</a>';
}
?>
</body>
</html>