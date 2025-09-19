<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Вопрос 1</title>
    <meta charset="utf-8">
</head>
<body>
    <p>Вопрос 1:</p>
    <p>Что такое AJAX?</p>
    
    <form action="task2.php" method="post">
        <input type="radio" name="answer1" value="A" required> A. Язык программирования для создания анимаций<br>
        <input type="radio" name="answer1" value="B"> B. Технология асинхронного обмена данными между браузером и сервером<br>
        <input type="radio" name="answer1" value="C"> C. Библиотека для работы с базами данных<br>
        <input type="submit" value="Далее">
    </form>
</body>
</html>