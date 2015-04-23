<?php

require __DIR__ . '/../classes/Model.php';

class NewsArticle
    extends Model
{
    protected static $table = 'news';
    public $id;
    public $title;
    public $text;
    public $where;
    public $whence;
    public $data = [];

    public function insert()
    {
        $this->where = '(title, text, date)';
        $this->whence = '(:title, :text, NOW())';
        $this->data = [':title' => $this->title, ':text' => $this->text];
        return parent::insert();
    }

    public function update()
    {
        $this->where = 'title =:title, text =:text';
        $this->whence = 'id=:id';
        $this->data = [':id' => $this->id, ':title' => $this->title, ':text' => $this->text];
        return parent::update();
    }

    public function delete()
    {
        $this->where = 'id=:id';
        $this->data = [':id' => $this->id];
        return parent::delete();
    }
}