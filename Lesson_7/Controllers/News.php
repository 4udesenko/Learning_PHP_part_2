<?php

namespace App\Controllers;

use App\Classes\View;
use App\Models\News as Model;

class News
    extends AbstractController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../views/news');
    }

    public function actionAll()
    {
        $this->view->items = Model::findAll();
        echo $this->view->render('all');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $this->view->item = Model::findOne($id);
        echo $this->view->render('one');
    }

}