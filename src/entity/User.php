<?php

/**
 * Class User
 */
class User extends Model
{
    /** Model configuration */
    public static $_table_use_short_name = true;
    public static $_table = 'users';
    public static $_id_column = 'id';

    /** @var int $id */
    public $id;

    /** @var string $username */
    public $username;

    /** @var string $password */
    public $password;

    /** @var string $rights */
    public $rights;
}