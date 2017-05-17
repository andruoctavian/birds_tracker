<?php

require_once "db.php";
require_once "User.php";
require_once "Bird.php";

/**
 * Class Report
 */
class Report extends Model
{
    const TABLE = 'report';
    const CREATE_QUERY = "CREATE TABLE " . self::TABLE . " (" .
        "id INTEGER PRIMARY KEY AUTOINCREMENT, " .
        "user_id INTEGER, " .
        "bird_id INTEGER, " .
        "lat DECIMAL(5,2), " .
        "lng DECIMAL(5,2), " .
        "date_time DATETIME, " .
        "FOREIGN KEY(user_id) REFERENCES user(id), " .
        "FOREIGN KEY(bird_id) REFERENCES bird(id)" .
        ")";

    public function user()
    {
        return $this->belongs_to('User');
    }

    public function bird()
    {
        return $this->belongs_to('Bird');
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
     * @return Report
     */
    public function setUserId(int $userId) : Report
    {
        $this->set('user_id', $userId);

        return $this;
    }

    /**
     * @return Bird
     */
    public function getBird() : Bird
    {
        return $this->bird()->findOne();
    }

    /**
     * @param int $birdId
     *
     * @return Report
     */
    public function setBirdId(int $birdId) : Report
    {
        $this->set('bird_id', $birdId);

        return $this;
    }

    /**
     * @return float
     */
    public function getLat() : float
    {
        return $this->get('lat');
    }

    /**
     * @param float $lat
     *
     * @return Report
     */
    public function setLat(float $lat) : Report{
        $this->set('lat', $lat);

        return $this;
    }

    /**
     * @return float
     */
    public function getLng() : float
    {
        return $this->get('lng');
    }

    /**
     * @param float $lng
     *
     * @return Report
     */
    public function setLng(float $lng) : Report{
        $this->set('lng', $lng);

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
     * @return Report
     */
    public function setDateTime(string $dateTime) : Report
    {
        $this->set('date_time', $dateTime);

        return $this;
    }

    /**
     * @param int $userId
     * @param int $birdId
     * @param float $lat
     * @param float $lng
     *
     * @return Report
     */
    public static function createReport(int $userId, int $birdId, float $lat, float $lng) : Report
    {
        /** @var Report $report */
        $report = Model::factory('Report')->create();

        $report
            ->setUserId($userId)
            ->setBirdId($birdId)
            ->setLat($lat)
            ->setLng($lng)
            ->setDateTime(date("Y-m-d H:i:s"))
            ->save();

        return $report;
    }

    /**
     * @return Report[]
     */
    public static function findLastReports() : array
    {
        $reports = Model::factory('Report')->findMany();

        return $reports;
    }
}