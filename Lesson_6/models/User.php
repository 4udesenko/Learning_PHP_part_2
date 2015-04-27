<?php

class User
    extends Model
{
    protected static $table = 'users';
    public $login;
    public $password;
    public $id;
}