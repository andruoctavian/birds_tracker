<?php

require_once "base.php";
require_once ROOT_DIR."/vendor/smarty/smarty/libs/Smarty.class.php";
require_once ROOT_DIR."/src/entities/Report.php";

/** @var Smarty $smarty */
$smarty = new Smarty();
dbInit();
session_start();

if (!isUserLoggedIn()) {
    header("Location: /src/routes/login.php");
}
$smarty->assign('username', getUsernameLoggedIn());

/** @var Report[] $reports */
$reports = Report::findLastReports();
$smarty->assign('reports', $reports);

$smarty->display(ROOT_DIR."/tpl/home.tpl");
