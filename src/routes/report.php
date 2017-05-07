<?php

require_once "base.php";
require_once ROOT_DIR."/vendor/smarty/smarty/libs/Smarty.class.php";
require_once ROOT_DIR."/src/entities/User.php";
require_once ROOT_DIR."/src/entities/Report.php";
require_once ROOT_DIR."/src/entities/Bird.php";

/** @var Smarty $smarty */
$smarty = new Smarty();
dbInit();
session_start();

if (isUserLoggedIn()) {
    if (isHttpPostRequest()) {
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
        /** @var Bird[] $birds */
        $birds = Bird::findAllBirds();
        $smarty->assign('birds', $birds);
        $smarty->display(ROOT_DIR."/tpl/report.tpl");
    }
} else {
    $smarty->display(ROOT_DIR."/tpl/access-denied.tpl");
}
