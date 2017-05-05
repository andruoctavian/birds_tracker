<?php

require_once "db.php";

/**
 * Class User
 */
class User extends Model
{
    const TABLE = 'user';
    const CREATE_QUERY = "CREATE TABLE " . self::TABLE . " (" .
        "id INTEGER PRIMARY KEY AUTOINCREMENT, " .
        "username VARCHAR(50), " .
        "email VARCHAR(50), " .
        "password VARCHAR(50)" .
        ")";

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->get('id');
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->get('username');
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->set('username', $username);

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->get('email');
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->set('email', $email);

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->get('password');
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->set('password', $password);

        return $this;
    }

    /**
     * @param string $password
     *
     * @return string
     */
    private function generatePasswordHash(string $password) : string
    {
        return sha1($password);
    }

    /**
     * @param string $username
     * @param string $email
     * @param string $password
     *
     * @return User
     */
    public static function createUser(string $username, string $email, string $password) : User
    {
        /** @var User $user */
        $user = Model::factory('User')->create();

        $user
            ->setUsername($username)
            ->setEmail($email)
            ->setPassword($user->generatePasswordHash($password));

        $user->save();

        return $user;
    }

    /**
     * @param string $username
     *
     * @return User | bool
     */
    public static function findUserByUsername(string $username)
    {
        /** @var User $user */
        $user = Model::factory('User')
            ->where('username', $username)
            ->findOne();

        return $user;
    }

    /**
     * @param $password
     *
     * @return bool
     */
    public function checkPassword($password) : bool
    {
        return $this->generatePasswordHash($password) === $this->getPassword();
    }
}