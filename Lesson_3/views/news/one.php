<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h1>Новость</h1>
    <article>
        <h3>
            <?php echo $item->title; ?>
        </h3>

        <div><?php echo $item->text; ?></div>
    </article>
</br>
<div><a href="/Lesson_3/">Назад</a></div>
</body>
</html>