<?php

$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'news';
$ctrlClassName = ucfirst($ctrl) . 'Controller';
$act = !empty($_GET['act']) ? $_GET['act'] : 'All';
$method = 'action' . $act;

require __DIR__ . '/controllers/' . $ctrlClassName . '.php';

$controller = new $ctrlClassName;
$controller->$method();