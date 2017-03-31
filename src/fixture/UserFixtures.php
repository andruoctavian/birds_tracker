<?php

require_once '../db.php';
require_once '../entity/User.php';

/**
 * @param string $username
 * @param string $password
 * @param string $rights
 *
 * @return User
 */
function createUser(string $username, string $password, string $rights): User
{
    /** @var User $user */
    $user = Model::factory(User::class)->create();
    $user->username = $username;
//    $user->password = md5($password);
//    $user->rights = $rights;

    $user->save();

    return $user;
}

dbInit();
ORM::get_db()->exec('DROP TABLE IF EXISTS users;');
ORM::get_db()->exec(
    'CREATE TABLE users (' .
    'id INTEGER PRIMARY KEY AUTOINCREMENT, ' .
    'username VARCHAR(50), ' .
    'password VARCHAR(50), ' .
    'rights VARCHAR(50)' .
    ')'
);
createUser('admin', 'admin', '');