<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h1>Новости</h1>
<?php foreach ($news as $article) : ?>
<article>
    <h3>
        <a href="/Lesson_1/article.php?id=<?php echo $article['id']; ?>">
            <?php echo $article['tittle']; ?>
        </a>
    </h3>
    <div><?php echo $article['text']; ?></div>
</article>
<?php endforeach; ?>
</body>
</html>
