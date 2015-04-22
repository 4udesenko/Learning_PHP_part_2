<?php

abstract class AbstractController
{
    public $newsModel;

    abstract protected function getTemplatePath();

    public function __construct()
    {
        $this->newsModel = new NewsArticle;
    }

    protected function render($template, $data)
    {
        extract($data);
        require $this->getTemplatePath() . '/' . $template . '.php';
    }

}