<?php

require __DIR__ . '/AbstractController.php';
require __DIR__ . '/../models/AddArticle.php';

class AdminController
    extends AbstractController
{
    public $newsModel;

    public function __construct()
    {
        $this->newsModel = new AddArticle;
    }

    public function getTemplatePath()
    {
        return __DIR__ . '/../views/news/';
    }

    public function actionForm()
    {
        require $this->getTemplatePath() . 'add.php';
    }

    public function actionAddArticle()
    {
        $title = $_POST['title'];
        $text = $_POST['text'];
        if (isset($_POST['title']) && isset($_POST['text'])) {
            $item = $this->newsModel->actionAdd($title, $text);
        }
        $this->render('add', ['item' => $item]);
    }
}