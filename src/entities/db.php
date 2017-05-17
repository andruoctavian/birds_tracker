<?php

if (!defined('ROOT_DIR')) define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);

require_once ROOT_DIR."/vendor/j4mie/idiorm/idiorm.php";
require_once ROOT_DIR."/vendor/j4mie/paris/paris.php";

function dbInit() {
    ORM::configure("sqlite:".ROOT_DIR."/db/db.sqlite");
}

function dropTable(string $table)
{
    ORM::getDb()->exec("DROP TABLE IF EXISTS {$table};");
}

function execSQLQuery(string $sqlQuery)
{
    ORM::getDb()->exec($sqlQuery);
}