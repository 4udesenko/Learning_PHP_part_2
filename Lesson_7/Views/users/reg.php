<?php
session_start()
?>

<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="utf-8">
    <title>Lesson_6</title>
</head>
<body>
<h1>Регистрация</h1>

<form method="post" action="/lesson_6/users/addUser">
    <p>Логин: <br><input type="text" name="login"></p>

    <p>Пароль: <br><input type="password" name="password"></p>

    <p><input type="submit" value="Регистрация"></p>
</form>
<footer>
    <div>
        <copyright>
    </div>
</footer>

</body>
</html>