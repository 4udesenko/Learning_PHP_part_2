<?php

class UsersController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../views/users');
    }

    public function actionReg()
    {
        if (!empty($_SESSION['user']['login'])) {
            die ("Вы уже зарегистрированны");
        } else {
            $this->view->display('reg');
        }
    }

    public function actionShowRegForm()
    {
        $this->view->display('reg');
    }

    public function actionAddUser()
    {
        if ($_POST['login'] != '' && $_POST['password'] != '') {
            $user = new User();
            $user->login = $_POST['login'];
            $user->password = md5($_POST['password']);
            $user->insert();
            if ($user->id !== false) {
                $_SESSION['ok'] = 'Пользователь ' . $user->login . ' добавлен';
            }
        } elseif ($_POST['login'] == '' || $_POST['password'] == '') {
            $_SESSION['errors'] = 'Не введены обязательные данные';
        }
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_6/");
        exit;
    }

    public function actionShowAuthForm()
    {
        if (!empty($_SESSION['user']['login'])) {
            die ('Вы уже авторизированны');
        } else {
            $this->view->display('auth');
        }
    }

    public function actionIsUser()
    {
        $login = $_POST['login'];
        $password = md5($_POST['password']);
        $res = User::findUser($login, $password);
        if ($res) {
            $_SESSION['user']['login'] = $res->login;
            header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_6/");
        } else {
            echo "Не совпадает пара: логин-пароль";
        }
    }
}