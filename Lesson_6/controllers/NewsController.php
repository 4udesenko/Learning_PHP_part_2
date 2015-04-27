<?php

class NewsController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../views/news');
    }

    public function actionAll()
    {
        $this->view->items = NewsArticle::findAll();
        echo $this->view->render('all');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $this->view->item = NewsArticle::findOne($id);
        echo $this->view->render('one');
    }

}