<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h1>Новости</h1>

<div><a href="/Lesson_3/admin/add">
        <button>Добавить новость</button>
    </a></div>
<?php foreach ($items as $item): ?>
    <article>
        <h3>
            <a href="/Lesson_3/news/one/<?php echo $item->id; ?>">
                <?php echo $item->title; ?>
            </a>
        </h3>

        <div><?php echo $item->text; ?></div>
    </article>
<?php endforeach; ?>
</body>
</html>