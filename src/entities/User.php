<?php

require_once "db.php";
require_once "Report.php";
require_once "Message.php";
require_once "Post.php";

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
        "password VARCHAR(50), " .
        "role INTEGER" .
        ")";

    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;

    public function reports()
    {
        return $this->has_many('Report');
    }

    public function messages()
    {
        return $this->has_many('Message');
    }

    public function posts()
    {
        return $this->has_many('Post');
    }

    public function comments()
    {
        return $this->has_many('Comment');
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->get('id');
    }

    /**
     * @return string
     */
    public function getUsername() : string
    {
        return $this->get('username');
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username) : User
    {
        $this->set('username', $username);

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->get('email');
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email) : User
    {
        $this->set('email', $email);

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword() : string
    {
        return $this->get('password');
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password) : User
    {
        $this->set('password', $password);

        return $this;
    }

    /**
     * @return int
     */
    public function getRole() : int
    {
        return $this->get('role');
    }

    /**
     * @param int $role
     *
     * @return User
     */
    public function setRole(int $role) : User
    {
        $this->set('role', $role);

        return $this;
    }

    /**
     * @return Report[]
     */
    public function getReports() : array
    {
        return $this->reports()->findMany();
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
     * @param int $role
     *
     * @return User
     */
    public static function createUser(string $username, string $email, string $password, int $role = 0) : User
    {
        /** @var User $user */
        $user = Model::factory('User')->create();

        $user
            ->setUsername($username)
            ->setEmail($email)
            ->setPassword($user->generatePasswordHash($password))
            ->setRole($role)
            ->save();

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

    public function getProfilePictureLink() : string
    {
        if (file_exists(ROOT_DIR."/res/img/profiles/{$this->getUsername()}")) {
            return "/res/img/profiles/{$this->getUsername()}";
        } else {
            return "/res/img/profiles/_default";
        }
    }
}