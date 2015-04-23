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
        $sql = 'SELECT * FROM ' . static::getTable() . ' ORDER BY date DESC';
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

    public function insert()
    {
        $sql = 'INSERT INTO ' . static::getTable() . ' ' . $this->where . ' VALUES ' . $this->whence;
        $db = new Db();
        return $db->getQueryId($sql, $this->data);
    }

    public function update()
    {
        $sql = 'UPDATE ' . static::getTable() . ' SET ' . $this->where . ' WHERE ' . $this->whence;
        $db = new Db();
        return $db->prepareQuery($sql, $this->data);
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::getTable() . ' WHERE ' . $this->where;
        $db = new Db();
        return $db->prepareQuery($sql, $this->data);
    }
}