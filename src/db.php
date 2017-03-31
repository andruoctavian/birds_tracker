<?php

define('root_dir', '/home/andru/Documents/PW/Prj/');

require_once root_dir.'web_app/ext/idiorm/idiorm.php';
require_once root_dir.'web_app/ext/paris/paris.php';

function dbInit()
{
    ORM::configure('sqlite:'.root_dir.'/db/db.sqlite');
}