<?php

require_once "base.php";
require_once ROOT_DIR."/vendor/smarty/smarty/libs/Smarty.class.php";
require_once ROOT_DIR."/src/entities/User.php";

/** @var Smarty $smarty */
$smarty = new Smarty();
dbInit();
session_start();

if (isUserLoggedIn()) {
    header("Location: /src/routes/home.php");
} else {
    $error = array();
    if (!empty($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = User::findUserByUsername($username);
        if (!$user) {
            $error['username'] = 'This username does not exists.';
        } elseif (!$user->checkPassword($password)) {
            $smarty->assign('username', $username);
            $error['password'] = 'Incorrect password.';
        } else {
            $_SESSION['username'] = $_POST['username'];
            setcookie('username', $_POST['username']);
            header("Location: /src/routes/home.php");
        }
    }

    $smarty->assign('action', $_SERVER['PHP_SELF']);
    $smarty->assign('error', $error);

    $smarty->display(ROOT_DIR."/tpl/login.tpl");

}