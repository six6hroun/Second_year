<?php
session_start();

if (!isset($_SESSION['logged_user'])) {
    header("Location: index.php");
    exit;
}
?>

<html>
<head>
    <title>Секретная страница</title>
    <meta charset="utf-8">
</head>
<body>
    <h3>Вы прошли авторизацию и находитесь на секретной странице</h3>
</body>
</html>