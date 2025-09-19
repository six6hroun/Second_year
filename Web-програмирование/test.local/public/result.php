<?php
session_start();
if (isset($_POST['answer5'])) {
    $_SESSION['answer5'] = $_POST['answer5'];
}

if (!isset($_SESSION['answer1']) || !isset($_SESSION['answer2']) || !isset($_SESSION['answer3']) || !isset($_SESSION['answer4']) || !isset($_SESSION['answer5'])) {
    header('Location: index.php');
    exit;
}

$correct_answers = [
    'answer1' => 'B',
    'answer2' => 'B',  
    'answer3' => 'B',
    'answer4' => 'B',
    'answer5' => 'B'   
];

$score = 0;
foreach ($correct_answers as $question => $correct) {
    if ($_SESSION[$question] == $correct) {
        $score++;
    }
}

$total_questions = count($correct_answers);
$percentage = round(($score / $total_questions) * 100);
?>

<!DOCTYPE html>
<html>
<head>
    <title>ответы</title>
    <meta charset="utf-8">
</head>
<body>
    <h3>Результаты теста</h3>
    <p>Вы ответили правильно на <?= $score ?> из <?= $total_questions ?> вопросов.</p>
    
    <h3>Правильные ответы:</h3>
    <p>1. Что такое AJAX?</p>
    <p>B. Технология асинхронного обмена данными между браузером и сервером</p><br>
    <p>2. Для чего используется Promise в JavaScript?</p>
    <p>B. Для работы с асинхронными операциями</p><br>
    <p>3. PHP - это:</p>
    <p>B. Серверный язык программирования</p><br>
    <p>4. Основное назначение HTML:</p>
    <p>B. Описание структуры веб-страницы</p><br>
    <p>5. JavaScript используется преимущественно для:</p>
    <p>B. Добавления интерактивности на веб-страницу</p>

    <form action="index.php">
        <input type="submit" value="Пройти тест снова">
    </form>
</body>
</html>