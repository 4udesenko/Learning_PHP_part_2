<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Форма добавления новости</title>
</head>
<body>
<h1>Форма добавления новости</h1>

<form action="/Lesson_3/admin/add" method="post">
    <p><input type="text" name="title" placeholder="Заголовок новости" size="25"/></p>

    <p><textarea name="text" cols="48" rows="8" placeholder="Текст новости"></textarea></p>

    <p><button role="button" type="submit">Отправить</button></p>
</form>
<a href="/Lesson_3">Назад</a>
</body>
</html>