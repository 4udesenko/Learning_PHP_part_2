<?php

namespace App\Models;

use App\Classes\Model;

class News
    extends Model
{
    protected static $table = 'news';

    public $id;
    public $title;
    public $text;
}