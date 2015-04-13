<?php

require __DIR__ . '/models/news.php';
require __DIR__ . '/config.php';
require_once __DIR__ . '/classes/db.php';

$dbObj = new DataBase(HOST, DB, USER, PASS);
$news = new News(DB);

require __DIR__ . '/views/index.php';