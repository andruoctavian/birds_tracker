<?php

require_once "constants.php";
require_once ROOT_DIR."/vendor/smarty/smarty/libs/Smarty.class.php";

/** @var Smarty $smarty */
$smarty = new Smarty();

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /src/routes/login.php");
}

$smarty->display(ROOT_DIR."/tpl/home.tpl");
