<?php

namespace App\Models;

use App\Classes\Model;

class User
    extends Model
{
    protected static $table = 'users';
    public $login;
    public $password;
    public $id;
}