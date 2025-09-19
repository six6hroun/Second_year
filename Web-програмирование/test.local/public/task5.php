<?php
session_start();
if (isset($_POST['answer4'])) {
    $_SESSION['answer4'] = $_POST['answer4'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Вопрос 3</title>
    <meta charset="utf-8">
</head>
<body>
    <p>Вопрос 5:</p>
    <p>JavaScript используется преимущественно для:</p>
    
    <form action="result.php" method="post">
        <input type="radio" name="answer5" value="A" required> A. Создания структуры веб-страницы<br>
        <input type="radio" name="answer5" value="B"> B. Добавления интерактивности на веб-страницу<br>
        <input type="radio" name="answer5" value="C"> C. Описания стилей веб-страницы<br>
        <input type="radio" name="answer5" value="D"> D. Работы с серверными базами данных<br>
        <input type="submit" value="Завершить тест">
    </form>
</body>
</html>