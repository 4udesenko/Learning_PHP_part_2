<?php

abstract class AbstractController
{

    protected function render($template, $data)
    {
        extract($data);
        require $this->getTemplatePath() . '/' . $template . '.php';
    }

}