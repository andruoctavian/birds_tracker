<?php

require_once "base.php";
require_once ROOT_DIR."/src/entities/User.php";
require_once ROOT_DIR."/src/entities/Report.php";

dbInit();
session_start();

if (isUserLoggedIn() && !empty($_POST)) {
    /** @var User $user */
    $user = User::findUserByUsername(getUsernameLoggedIn());
    try {
        Report::createReport(
            $user->getId(),
            $_POST['bird'],
            $_POST['lat'],
            $_POST['lng']
        );
    } catch (Exception $e) {
        echo false;
    }
    echo true;
} else {
    echo false;
}