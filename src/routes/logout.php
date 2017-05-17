<?php

session_start();
unset($_SESSION['username']);
setcookie('username', null, 0);
session_destroy();

header("Location: /src/routes/login.php");