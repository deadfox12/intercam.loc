<?php
//Функция проверки авторизации пользователя
function userIsLoggedIn()
{
    if (isset($_POST['action']) and $_POST['action'] == 'login')
    {
        if (!isset($_POST['email']) or $_POST['email'] == '' or
            !isset($_POST['password']) or $_POST['password'] == '')
        {
            $GLOBALS['loginError'] = 'Заполните оба поля';
            return FALSE;
        }

        $password = md5($_POST['password']);

        if (databaseContainsUser($_POST['email'], $password))
        {
            session_start();
            $_SESSION['loggedIn'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $password;
            return TRUE;
        }
        else
        {
            session_start();
            unset($_SESSION['loggedIn']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            $GLOBALS['loginError'] = 'Что-то не так! Вероятно, неправильно указан логин (e-mail) или пароль.';
            return FALSE;
        }
    }

    if (isset($_POST['action']) and $_POST['action'] == 'logout')
    {
        session_start();
        unset($_SESSION['loggedIn']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: ' . $_POST['goto']);
        exit();
    }

    session_start();
    if (isset($_SESSION['loggedIn']))
    {
        return databaseContainsUser($_SESSION['email'], $_SESSION['password']);
    }
}

//
function databaseContainsUser($email, $password)
{
    include '../classes/db.php';

    try
    {
        $sql = 'SELECT COUNT(*) FROM users
        WHERE email = :email AND password = :password';
        $s = $pdo->prepare($sql);
        $s->bindValue(':email', $email);
        $s->bindValue(':password', $password);
        $s->execute();
    }
    catch (PDOException $e)
    {
        exit();
    }

    $row = $s->fetch();

    if ($row[0] > 0)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}