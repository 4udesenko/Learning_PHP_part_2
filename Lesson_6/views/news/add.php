<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Форма добавления новости</title>
</head>
<body>
<h1>Форма добавления новости</h1>

<form action="/Lesson_6/admin/save" method="post">
    <p><input type="text" name="title" placeholder="Заголовок новости" size="25" value="<?= $items->title ?>"/></p>

    <p><textarea name="text" cols="48" rows="8" placeholder="Текст новости"><?= $items->text ?></textarea></p>
    <input type="hidden" value="<?= $_GET['id'] ?>" name="id_hidden">

    <p>
        <button role="button" type="submit">Отправить</button>
    </p>
</form>
<a href="/Lesson_6">Назад</a>
</br>
</br>
<copyright>
</body>
</html>