<?php

require __DIR__ . '/AbstractController.php';
require __DIR__ . '/../models/NewsArticle.php';

class NewsController
    extends AbstractController
{
    public  function __construct()
    {
        parent::__construct();
    }

    protected function getTemplatePath()
    {
        return __DIR__ . '/../views/news/';
    }

    public function actionAll()
    {
        $items = $this->newsModel->findAll();
        $this->render('all', ['items' => $items]);
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = $this->newsModel->findOne($id);
        $this->render('one', ['item' => $item]);
    }

}