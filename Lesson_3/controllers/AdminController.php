<?php

require __DIR__ . '/AbstractController.php';
require __DIR__ . '/../models/AddArticle.php';

class AdminController
    extends AbstractController
{
    public function getTemplatePath()
    {
        return __DIR__ . '/../views/news/';
    }

    public function form()
    {
        require $this->getTemplatePath() . 'add.php';
    }

    public function addArticle($title, $text)
    {
        $add = new AddArticle();
        $add->actionAdd($title, $text);
    }
}