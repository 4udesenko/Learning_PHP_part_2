<?php

require __DIR__ . '/AbstractController.php';
require __DIR__ . '/../models/NewsArticle.php';

class NewsController
    extends AbstractController
{

    protected function getTemplatePath()
    {
        return __DIR__ . '/../views/news/';
    }

    public function actionAll()
    {
        $newsModel = new NewsArticle();
        $items = $newsModel->findAll();
        $this->render('all', ['items' => $items]);
    }

    public function actionOne($id)
    {
        $newsModel = new NewsArticle();
        $item = $newsModel->findOne($id);
        $this->render('one', ['item' => $item]);
    }

}