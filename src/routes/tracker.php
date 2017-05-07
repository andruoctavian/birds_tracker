<?php

require_once "base.php";
require_once ROOT_DIR."/vendor/smarty/smarty/libs/Smarty.class.php";
require_once ROOT_DIR."/src/entities/Report.php";

/** @var Smarty $smarty */
$smarty = new Smarty();
dbInit();
session_start();

if (isUserLoggedIn()) {
    if (isHttpPostRequest()) {
        /** @var Report[] $reports */
        $reports = Report::findLastReports();
        $locations = array_map(function (Report $report) {
            return array(
                'location' => array(
                    'lat' => $report->getLat(),
                    'lng' => $report->getLng(),
                ),
                'bird' => $report->getBird()->getName(),
                'user' => $report->getUser()->getUsername(),
            );
        }, $reports);
        echo json_encode($locations);
    } else {
        $smarty->display(ROOT_DIR."/tpl/tracker.tpl");
    }
} else {
    $smarty->display(ROOT_DIR."/tpl/access-denied.tpl");
}