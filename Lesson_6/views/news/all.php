<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h1>Новости</h1>
<p>Вы зашли на сайт как <?php echo $_SESSION['user']['login'] ? $_SESSION['user']['login'] : 'гость'; ?></p>
<div><a href="/lesson_6/users/showAuthForm">Авторизация</a></div>
<div><a href="/lesson_6/users/showRegForm">Регистрация</a></div>
<?php if (!empty($_SESSION['user']['login'])) { ?>
    <div><a href="/lesson_6/?logout=true">Выход</a></div>
<?php } ?>
</br>
<div><a href="/Lesson_6/admin/form">
        <?php if (!empty($_SESSION['user']['login'])) { ?>
            <button>Добавить новость</button>
        <?php } ?>
    </a></div>
<?php foreach ($items as $item): ?>
    <article>
        <h1>
            <a href="/Lesson_6/news/one/<?php echo $item->id; ?>">
                <?php echo $item->title; ?>
            </a>
        </h1>

        <div><?php echo $item->text; ?></div>
    </article>
<?php endforeach; ?>
</br>
<copyright>
</body>
</html>