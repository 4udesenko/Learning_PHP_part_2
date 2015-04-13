<?php

require_once __DIR__ . '/../classes/article.php';
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/form.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $text = $_POST['text'];
}

$connect = new DataBase(HOST, DB, USER, PASS);
$addArt = new AddArticle($title, $text);

echo '<h3>Новость добавлена!</h3>';
echo '<a href="/Lesson_2/index.php">На главную</a>';