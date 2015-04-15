<?php

require __DIR__ . '/views/news/add.php';

$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'admin';
$ctrlClassName = ucfirst($ctrl) . 'Controller';

if (isset($_POST['title']) && isset($_POST['text'])) {
    require __DIR__ . '/controllers/' . $ctrlClassName . '.php';
    $controller = new $ctrlClassName;
    $controller->addArticle($_POST['title'], $_POST['text']);
}
