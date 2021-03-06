<?php

class View
    implements Iterator
{
    protected $path;
    protected $data = [];

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function render($template)
    {
        foreach ($this->data as $k => $v) {
            $$k = $v;
        }
        ob_start();
        include($this->path . '/' . $template . '.php');
        $content = ob_get_contents();
        ob_end_clean();
        $content = preg_replace('/<copyright>/i', '&copy; 4udesenko 2015', $content);
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    public function current()
    {
        return current($this->data);
    }

    public function next()
    {
        next($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        return false !== current($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }
}