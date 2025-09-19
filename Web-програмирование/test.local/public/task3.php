<?php
session_start();
if (isset($_POST['answer2'])) {
    $_SESSION['answer2'] = $_POST['answer2'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Вопрос 3</title>
    <meta charset="utf-8">
</head>
<body>
    <p>Вопрос 3:</p>
    <p>PHP - это:</p>
    
    <form action="task4.php" method="post">
        <input type="radio" name="answer3" value="A" required> A. Клиентский язык программирования<br>
        <input type="radio" name="answer3" value="B"> B. Серверный язык программирования<br>
        <input type="radio" name="answer3" value="C"> C. Язык разметки<br>
        <input type="radio" name="answer3" value="D"> D. Система управления базами данных<br>
        <input type="submit" value="Далее">
    </form>
</body>
</html>