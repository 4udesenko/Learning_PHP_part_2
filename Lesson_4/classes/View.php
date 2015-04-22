<?php

class View
    implements Iterator
{
    protected $path;
    protected $data = [];
    private $position;

    public function __construct($path)
    {
        $this->path = $path;
        $this->position = 0;
    }

    function rewind() {
        var_dump(__METHOD__);
        $this->position = 0;
    }

    function current() {
        var_dump(__METHOD__);
        return $this->data[$this->position];
    }

    function key() {
        var_dump(__METHOD__);
        return $this->position;
    }

    function next() {
        var_dump(__METHOD__);
        ++$this->position;
    }

    function valid() {
        var_dump(__METHOD__);
        return isset($this->data[$this->position]);
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
        function callBack($buffer) {
            return str_replace('<copyryght>', '(c) 4udesenko 2015', $buffer);
        }
        ob_start('callBack');
        include($this->path . '/' . $template . '.php');
        ob_end_flush();
    }
}