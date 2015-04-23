<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h1>Новость</h1>
<article>
    <h2>
        <?php echo $item->title; ?>
    </h2>

    <div><?php echo $item->text; ?></div>
</article>
</br>
<div><a href="/Lesson_5/admin/form/<?= $item->id ?>">
        <button>Редактировать</button>
    </a>
</div>
</br>
<div><a href="/Lesson_5/admin/delete/<?= $item->id ?>">
        <button>Удалить новость</button>
    </a>
</div>
</br>
<div><a href="/Lesson_5/">Назад</a></div>
</br>
<copyright>
</body>
</html>