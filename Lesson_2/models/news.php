<?php

require_once __DIR__ . '/../classes/db.php';
require_once __DIR__ . '/../classes/article.php';

class News extends Article
{
    public $dbObj;

    public function __construct($dbObject)
    {
        $this->dbObj = $dbObject;
    }

    public function getArticle()
    {
        $this->dbObj->getArticle();
    }

    public function getNews()
    {
        $sql = 'SELECT * FROM news ORDER BY date DESC';
        return Article::dbFindAllByQuery($sql);
    }

    public function GetNewsById($id)
    {
        $sql = 'SELECT * FROM news WHERE id=' . $id;
        return Article::dbFindAllByQuery($sql)[0];
    }
}
