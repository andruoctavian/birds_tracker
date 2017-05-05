<?php

require_once "../../vendor/j4mie/idiorm/idiorm.php";
require_once "../../vendor/j4mie/paris/paris.php";

function dbInit() {
    ORM::configure("sqlite:../../db/db.sqlite");
}

function dropTable(string $table)
{
    ORM::getDb()->exec("DROP TABLE IF EXISTS {$table};");
}

function execSQLQuery(string $sqlQuery)
{
    ORM::getDb()->exec($sqlQuery);
}