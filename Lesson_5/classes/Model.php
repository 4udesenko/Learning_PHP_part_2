<?php

require __DIR__ . '/../classes/Db.php';

abstract class Model
{
    protected static $table;

    public static function getTable()
    {
        return static::$table;
    }

    public static function findAll()
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' . static::getTable();
        $db = new Db();
        return $db->findAll($class, $sql);
    }

    public static function findOne($id)
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' . static::getTable() . ' WHERE id=:id';
        $db = new Db();
        return $db->findOne($class, $sql, [':id' => $id]);
    }

    public static function addOne($title, $text)
    {
        $class = static::class;
        $sql = 'INSERT INTO ' . static::getTable() . ' (title, text, date) VALUES (title:title, text:text, NOW())';
        $db = new Db();
        return $db->addOne($class, $sql, [':title' => $title, ':text' => $text]);
    }

    public function insert()
    {
        $sql = "INSERT INTO " . static::getTable() . " " . $this->where . " VALUES " . $this->whence;
        $db = new Db();
        return $db->getQueryId($sql, $this->data);
    }

    public function update()
    {
        $sql = "UPDATE " . static::getTable() . " SET " . $this->where . " WHERE " . $this->whence;
        $db = new Db();
        return $db->getQuery($sql, $this->data);
    }

    public function delete()
    {
        $sql = "DELETE FROM " . static::getTable() . " WHERE " . $this->whence;
        $db = new Db();
        return $db->getQuery($sql, $this->data);
    }
}