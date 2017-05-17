<?php

require_once "db.php";
require_once "User.php";

/**
 * Class Message
 */
class Message extends Model
{
    const TABLE = 'message';
    const CREATE_QUERY = "CREATE TABLE " . self::TABLE . " (" .
    "id INTEGER PRIMARY KEY AUTOINCREMENT, " .
    "body LONGTEXT, " .
    "user_id INTEGER, " .
    "date_time DATETIME, " .
    "FOREIGN KEY(user_id) REFERENCES user(id)" .
    ")";

    public function user()
    {
        return $this->belongs_to('User');
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->get('id');
    }

    /**
     * @return User
     */
    public function getUser() : User
    {
        return $this->user()->findOne();
    }

    /**
     * @param int $userId
     *
     * @return Message
     */
    public function setUserId(int $userId) : Message
    {
        $this->set('user_id', $userId);

        return $this;
    }

    /**
     * @return string
     */
    public function getBody() : string
    {
        return $this->get('body');
    }

    /**
     * @param string $body
     *
     * @return Message
     */
    public function setBody(string $body) : Message
    {
        $this->set('body', $body);

        return $this;
    }

    /**
     * @return string
     */
    public function getDateTime() : string
    {
        return $this->get('date_time');
    }

    /**
     * @param string $dateTime
     *
     * @return Message
     */
    public function setDateTime(string $dateTime) : Message
    {
        $this->set('date_time', $dateTime);

        return $this;
    }

    /**
     * @param int $userId
     * @param string $body
     *
     * @return Message
     */
    public static function createMessage(int $userId, string $body) : Message
    {
        /** @var Message $message */
        $message = Model::factory('Message')->create();

        $message
            ->setUserId($userId)
            ->setBody($body)
            ->setDateTime(date("Y-m-d H:i:s"))
            ->save();

        return $message;
    }

    /**
     * @param int $offset
     *
     * @return Message[]
     */
    public static function findChatMessages(int $offset = 0) : array
    {
        /** @var Message[] $messages */
        $messages = Model::factory('Message')
            ->findMany();

        return $messages;
    }
}