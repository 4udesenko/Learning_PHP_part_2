<?php

class AdminController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../views/news');
    }

    public function actionForm()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->view->items = NewsArticle::findOne($_GET['id']);
        }
        $this->view->display('add');
    }

    public function actionSave()
    {
        if (isset($_POST['id_hidden']) && !empty($_POST['id_hidden'])) {
            $this->actionUpdate();
        } else {
            $this->actionAdd();
        }
    }

    public function actionAdd()
    {
        $article = new NewsArticle();
        $title = $_POST['title'];
        $text = $_POST['text'];
        if (isset($_POST['title']) && isset($_POST['text'])) {
            $article->title = $title;
            $article->text = $text;
            $article->id = $article->insert();
        }
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_6/");
    }

    public function actionUpdate()
    {
        $article = NewsArticle::findOne($_POST['id_hidden']);
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $article->update();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_6/");
    }

    public function actionDelete()
    {
        $article = NewsArticle::findOne($_GET['id']);
        $article->id = $_GET['id'];
        $article->delete();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_6/");
    }
}
