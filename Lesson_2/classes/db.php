<?php

class DataBase {

    public function __construct($host, $db, $user, $pass)
    {
        $this->connect($host, $db, $user, $pass);
    }

    protected function connect($host, $db, $user, $pass)
    {
        mysql_connect($host, $user, $pass);
        mysql_select_db($db);
    }

    public function addRecord($sql)
    {
        return mysql_query($sql);
    }

    public function dbFindAllByQuery($sql)
    {
        $res = mysql_query($sql);
        $ret = [];
        while (false !== ($row = mysql_fetch_array($res))) {
            $ret[] = $row;
        }
        return $ret;
    }

    public function dbFindOneByQuery($sql)
    {
        $this->dbFindAllByQuery($sql)[0];
    }
}