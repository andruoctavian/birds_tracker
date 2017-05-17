<?php

require_once "db.php";
require_once "User.php";
require_once "Post.php";


/**
 * Class Comment
 */
class Comment extends Model
{
    const TABLE = 'comment';
    const CREATE_QUERY = "CREATE TABLE " . self::TABLE . " (" .
    "id INTEGER PRIMARY KEY AUTOINCREMENT, " .
    "body LONGTEXT, " .
    "user_id INTEGER, " .
    "post_id INTEGER, " .
    "date_time DATETIME, " .
    "FOREIGN KEY(user_id) REFERENCES user(id), " .
    "FOREIGN KEY(post_id) REFERENCES post(id)" .
    ")";

    public function user()
    {
        return $this->belongs_to('User');
    }

    public function post()
    {
        return $this->belongs_to('Post');
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
     * @return Comment
     */
    public function setUserId(int $userId) : Comment
    {
        $this->set('user_id', $userId);

        return $this;
    }

    /**
     * @return Post
     */
    public function getPost() : Post
    {
        return $this->post()->findOne();
    }

    /**
     * @param int $postId
     *
     * @return Comment
     */
    public function setPostId(int $postId) : Comment
    {
        $this->set('post_id', $postId);

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
     * @return Comment
     */
    public function setBody(string $body) : Comment
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
     * @return Comment
     */
    public function setDateTime(string $dateTime) : Comment
    {
        $this->set('date_time', $dateTime);

        return $this;
    }


    /**
     * @param int $userId
     * @param string $body
     * @param int $postId
     *
     * @return Comment
     */
    public static function createComment(int $userId, int $postId, string $body) : Comment
    {
        /** @var Comment $comment */
        $comment = Model::factory('Comment')->create();

        $comment
            ->setUserId($userId)
            ->setPostId($postId)
            ->setBody($body)
            ->setDateTime(date("Y-m-d H:i:s"))
            ->save();

        return $comment;
    }

    /**
     * @param int $postId
     * @param int $offset
     *
     * @return array
     */
    public static function findPostComment(int $postId, int $offset = 0) : array
    {
        /** @var Comment[] $comments */
        $comments = Model::factory('Comment')
            ->whereEqual('post_id', $postId)
            ->findMany();

        return $comments;
    }
}