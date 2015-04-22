<?php

require __DIR__ . '/Article.php';

class AddArticle
    extends Article
{
    protected function getTable()
    {
        return 'news';
    }

    public function actionAdd($title, $text)
    {
        $sql = "INSERT INTO news (title, text, date) VALUES ('$title', '$text', NOW())";
        return $this->db->addOne($sql);
    }
}