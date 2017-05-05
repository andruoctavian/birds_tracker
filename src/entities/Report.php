<?php

require_once "db.php";

/**
 * Class Report
 */
class Report extends Model
{
    const TABLE = 'report';
    const CREATE_QUERY = "CREATE TABLE " . self::TABLE . " (" .
    "id INTEGER PRIMARY KEY AUTOINCREMENT, " .
    "username VARCHAR(50), " .
    "bird VARCHAR(50), " .
    "place VARCHAR(50)" .
    ")";
}