<?php

require_once "db.php";
require_once "Report.php";

/**
 * Class Bird
 */
class Bird extends Model
{
    const TABLE = 'bird';
    const CREATE_QUERY = "CREATE TABLE " . self::TABLE . " (" .
        "id INTEGER PRIMARY KEY AUTOINCREMENT, " .
        "name VARCHAR(50)" .
        ")";

    public function reports()
    {
        return $this->has_many('Report');
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
    public function getName() : string
    {
        return $this->get('name');
    }

    /**
     * @param $name
     *
     * @return Bird
     */
    public function setName(string $name) : Bird
    {
        $this->set('name', $name);

        return $this;
    }

    /**
     * @return Report[]
     */
    public function getReports() : array
    {
        return $this->reports()->findMany();
    }

    public static function createBird(string $name) : Bird
    {
        /** @var Bird $bird */
        $bird = Model::factory('Bird')->create();

        $bird
            ->setName($name)
            ->save();

        return $bird;
    }

    /**
     * @return Bird[]
     */
    public static function findAllBirds() : array
    {
        $birds = Model::factory('Bird')->findMany();

        return $birds;
    }
}