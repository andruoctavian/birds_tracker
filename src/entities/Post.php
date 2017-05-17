<?php

require_once "db.php";
require_once "User.php";
require_once "Comment.php";

/**
 * Class Post
 */
class Post extends Model
{
    const TABLE = 'post';
    const CREATE_QUERY = "CREATE TABLE " . self::TABLE . " (" .
    "id INTEGER PRIMARY KEY AUTOINCREMENT, " .
    "body LONGTEXT, " .
    "type INTEGER," .
    "media_link STRING," .
    "user_id INTEGER, " .
    "date_time DATETIME, " .
    "FOREIGN KEY(user_id) REFERENCES user(id)" .
    ")";

    const TEXT_TYPE = 0;
    const IMG_TYPE = 1;
    const VIDEO_TYPE = 2;

    public function user()
    {
        return $this->belongs_to('User');
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
     * @return User
     */
    public function getUser() : User
    {
        return $this->user()->findOne();
    }

    /**
     * @param int $userId
     *
     * @return Post
     */
    public function setUserId(int $userId) : Post
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
     * @return Post
     */
    public function setBody(string $body) : Post
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
     * @return Post
     */
    public function setDateTime(string $dateTime) : Post
    {
        $this->set('date_time', $dateTime);

        return $this;
    }

    /**
     * @return int
     */
    public function getType() : int
    {
        return $this->get('type');
    }

    /**
     * @param int $type
     *
     * @return Post
     */
    public function setType(int $type) : Post
    {
        $this->set('type', $type);

        return $this;
    }

    /**
     * @return string
     */
    public function getMediaLink() : string
    {
        return $this->get('media_link');
    }

    public function setMediaLink(string $mediaLink) : Post
    {
        $this->set('media_link', $mediaLink);

        return $this;
    }

    /**
     * @return Comment[]
     */
    public function getComments() : array
    {
        return $this->comments()->findMany();
    }

    /**
     * @param int $userId
     * @param string $body
     * @param int $type
     * @param string|null $mediaLink
     *
     * @return Post
     */
    public static function createPost(int $userId, string $body, int $type, string $mediaLink = null) : Post
    {
        /** @var Post $post */
        $post = Model::factory('Post')->create();

        $post
            ->setUserId($userId)
            ->setBody($body)
            ->setType($type)
            ->setMediaLink($mediaLink)
            ->setDateTime(date("Y-m-d H:i:s"))
            ->save();

        return $post;
    }

    /**
     * @param int $offset
     *
     * @return array
     */
    public static function findGalleryPosts(int $offset = 0) : array
    {
        /** @var Post[] $posts */
        $posts = Model::factory('Post')
            ->orderByDesc('id')
            ->findMany();

        return $posts;
    }
}