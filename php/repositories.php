<?php

require_once '../ext/idiorm/idiorm.php';

function dbInit()
{
    ORM::configure('sqlite:/home/andru/Documents/PW/Prj/db/db.sqlite');
}