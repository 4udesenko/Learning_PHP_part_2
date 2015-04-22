<?php

require __DIR__ . '/models/news.php';
require __DIR__ . '/config.php';
require_once __DIR__ . '/classes/db.php';

$db = new DataBase(HOST, DB, USER, PASS);
$article = News::GetNewsById($_GET['id']);

include __DIR__ . '/views/article.php';