<?php

require __DIR__ . '/../functions/db.php';

function addNews($title, $text)
{
    dbConnect();
    $title = mysql_real_escape_string($title);
    $text = mysql_real_escape_string($text);
    $query = "INSERT INTO news (title, text) VALUES ('$title', '$text')";
    return mysql_query($query);
}