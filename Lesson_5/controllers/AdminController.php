<?php

require __DIR__ . '/AbstractController.php';
require __DIR__ . '/../models/NewsArticle.php';
require __DIR__ . '/../classes/View.php';

class AdminController
    extends AbstractController
{
    protected $view;
    public $article;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../views/news');
        $this->article = new NewsArticle();
    }

    public function actionForm(){
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->view->items = NewsArticle::findOne($_GET['id']);
        }
        echo $this->view->render('add');
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
        $title = $_POST['title'];
        $text = $_POST['text'];
        if (isset($_POST['title']) && isset($_POST['text'])) {
            $this->article->title = $title;
            $this->article->text = $text;
            $this->article->id = $this->article->insert();
        }
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_5/" );
    }

    public function actionUpdate()
    {
        $this->article->id = $_POST['id_hidden'];
        $this->article->title = $_POST['title'];
        $this->article->text = $_POST['text'];
        $this->article->update();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_5/" );
    }

    public function actionDelete()
    {
        $this->article->id = $_GET['id'];
        $this->article->delete();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_5/" );
    }
}
