<?php
session_start();
if (isset($_POST['answer3'])) {
    $_SESSION['answer3'] = $_POST['answer3'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Вопрос 3</title>
    <meta charset="utf-8">
</head>
<body>
    <p>Вопрос 4:</p>
    <p>Основное назначение HTML:</p>
    
    <form action="task5.php" method="post">
        <input type="radio" name="answer4" value="A" required> A. Создание интерактивных веб-приложений<br>
        <input type="radio" name="answer4" value="B"> B. Описание структуры веб-страницы<br>
        <input type="radio" name="answer4" value="C"> C. Стилизация веб-страниц<br>
        <input type="radio" name="answer4" value="D"> D. Работа с сервером<br>
        <input type="submit" value="Далее">
    </form>
</body>
</html>