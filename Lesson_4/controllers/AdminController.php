<?php

require __DIR__ . '/AbstractController.php';
require __DIR__ . '/../models/NewsArticle.php';
require __DIR__ . '/../classes/View.php';

class AdminController
    extends AbstractController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../views/news');
    }

    public function actionAdd()
    {
        $newsModel = new NewsArticle();
        $title = $_POST['title'];
        $text = $_POST['text'];
        if (isset($_POST['title']) && isset($_POST['text'])) {
            $this->view->item = $newsModel->addOne($title, $text);
        }
        echo $this->view->render('add');
    }
}