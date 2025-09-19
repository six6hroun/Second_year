<?php
session_start();
if (isset($_POST['answer1'])) {
    $_SESSION['answer1'] = $_POST['answer1'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Вопрос 2</title>
    <meta charset="utf-8">
</head>
<body>
    <p>Вопрос 2:</p>
    <p>Для чего используется Promise в JavaScript?</p>
    
    <form action="task3.php" method="post">
        <input type="radio" name="answer2" value="A" required> A. Для создания циклов<br>
        <input type="radio" name="answer2" value="B"> B. Для работы с асинхронными операциями<br>
        <input type="radio" name="answer2" value="C"> C. Для объявления переменных<br>
        <input type="radio" name="answer2" value="D"> D. Для создания HTML-элементов<br>
        <input type="submit" value="Далее">
    </form>
</body>
</html>