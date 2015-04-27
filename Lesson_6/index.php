<?php
session_start();

require __DIR__ . '/autoload.php';

$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'news';
$ctrlClassName = ucfirst($ctrl) . 'Controller';
$act = !empty($_GET['act']) ? $_GET['act'] : 'all';
$method = 'action' . ucfirst($act);

if (isset($_GET['logout']) && $_GET['logout'] == true) {
    unset ($_SESSION['user']['login']);
}
try {
    $controller = new $ctrlClassName;
    $controller->$method();
} catch (E404Exception $e) {
    echo $e->getMessage();
}
