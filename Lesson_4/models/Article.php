<?php

require __DIR__ . '/../classes/Db.php';

abstract class Article
{

    protected $db;

    abstract protected function getTable();

    public function __construct()
    {
        $this->db = new Db();
    }

    public function findAll()
    {
        return $this->db->findAll('SELECT * FROM ' . $this->getTable() . ' ORDER BY date DESC');
    }

    public function findOne($id)
    {
        return $this->db->findOne('SELECT * FROM ' . $this->getTable() . ' WHERE id=' . $id);
    }

    public function addOne($title, $text)
    {
        return $this->db->addOne("INSERT INTO " . $this->getTable() . " (title, text, date) VALUES ('$title', '$text', NOW())");
    }
}