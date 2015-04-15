<?php

abstract class AbstractController
{

    abstract protected function getTemplatePath();

    protected function render($template, $data)
    {
        extract($data);
        require $this->getTemplatePath() . $template . '.php';
    }

}