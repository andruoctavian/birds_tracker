<?php

require_once "base.php";
require_once ROOT_DIR."/vendor/smarty/smarty/libs/Smarty.class.php";
require_once ROOT_DIR."/src/entities/User.php";

/** @var Smarty $smarty */
$smarty = new Smarty();
dbInit();
session_start();

$error = array();
if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = User::findUserByUsername($username);
    if (!$user) {
        $error['username'] = 'This username does not exists.';
    } elseif (!$user->checkPassword($password)) {
        $error['password'] = 'Incorrect password.';
    } else {
        $_SESSION['username'] = $_POST['username'];
        header("Location: /src/routes/home.php");
    }
}

$smarty->assign('action', $_SERVER['PHP_SELF']);

$smarty->display(ROOT_DIR."/tpl/login.tpl");
