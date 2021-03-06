<?php

abstract class Model
{
    protected static $table;
    public $id;

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

    public static function findUser($login, $password)
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' . static::getTable() . ' WHERE login=:login AND password=:password';
        $db = new Db();
        return $db->findOne($class, $sql, [':login' => $login, ':password' => $password]);
    }

    public function insert()
    {
        $properties = get_object_vars($this);
        unset($properties['id']);
        $columns = array_keys($properties);
        $places = [];
        $data = [];
        foreach ($columns as $property) {
            $places[] = ':' . $property;
            $data[':' . $property] = $this->$property;
        }
        $sql = 'INSERT INTO ' . static::getTable() . '
                (' . implode(', ', $columns) . ')
                VALUES
                (' . implode(', ', $places) . ')
                ';
        $db = new Db();
        $db->prepareQuery($sql, $data);
        return $this->id = $db->getId();
    }

    public function update()
    {
        $properties = get_object_vars($this);
        $columns = array_keys($properties);
        foreach ($columns as $property) {
            $data[':' . $property] = $this->$property;
            $places[] = $property . '=:' . $property;
        }
        $sql = 'UPDATE ' . static::getTable() . '
                SET ' . implode(', ', $places) . '
                WHERE id=:id';
        $db = new Db();
        return $db->prepareQuery($sql, $data);
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::getTable() . ' WHERE id=:id';
        $db = new Db();
        return $db->prepareQuery($sql, [':id' => $this->id]);
    }
}