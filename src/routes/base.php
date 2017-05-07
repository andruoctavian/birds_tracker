<?php

define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);
define('REL_DIR', "../..");

/**
 * @return bool
 */
function isUserLoggedIn() : bool
{
    return isset($_SESSION['username']);
}

/**
 * @return string | null
 */
function getUsernameLoggedIn()
{
    if (isUserLoggedIn()) {
        return $_SESSION['username'];
    }

    return null;
}

/**
 * @return bool
 */
function isHttpPostRequest()
{
    return ($_SERVER['REQUEST_METHOD'] == 'POST');
}