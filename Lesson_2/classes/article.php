<?php

require_once __DIR__ . '/../classes/db.php';

abstract class Article extends DataBase
{
    protected $title;
    protected $text;
    protected $date;

    public function __construct($title = '', $text = '', $date = false)
    {
        $this->createArticle($title, $text, $date);
    }

    public function createArticle($title, $text, $date)
    {
        $this->title = $title;
        $this->text = $text;
        $this->date = $date;
    }

    public function getArticle()
    {
        return [
            'title' => $this->title,
            'text' => $this->text,
            'date' => $this->date,
        ];
    }

}
