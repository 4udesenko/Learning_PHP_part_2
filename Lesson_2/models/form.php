<?php

require_once __DIR__ . '/../classes/db.php';
require_once __DIR__ . '/../classes/article.php';
require_once __DIR__ . '/../config.php';

class AddArticle extends Article
{
    public function addArticle($title, $text)
    {
        $sql = "INSERT INTO news (title, text, date) VALUES ('$title', '$text', NOW())";
        return $this->addRecord($sql);
    }
}

