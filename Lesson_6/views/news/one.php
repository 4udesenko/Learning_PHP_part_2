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
<?php if (!empty($_SESSION['user']['login'])) { ?>
    <div><a href="/Lesson_6/admin/form/<?= $item->id ?>">
            <button>Редактировать</button>
        </a>
    </div>
<?php } ?>
</br>
<?php if (!empty($_SESSION['user']['login'])) { ?>
    <div><a href="/Lesson_6/admin/delete/<?= $item->id ?>">
            <button>Удалить новость</button>
        </a>
    </div>
<?php } ?>
</br>
<div><a href="/Lesson_6/">Назад</a></div>
</br>
<copyright>
</body>
</html>