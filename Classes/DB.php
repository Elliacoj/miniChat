<?php

namespace App\Classes;

use PDO;
use PDOException;

class DB
{
    private string $host = "localhost";
    private string $db = "zmml7017_miniChat_Amaury";
    private string $user = "zmml7017_formation";
    private string $password = "azerty1234";

    private static ?PDO $dbInstance = null;

    public function __construct() {
        try {
            self::$dbInstance = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->password);
            self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $exeption) {
            echo $exeption->getMessage();
        }
    }

    /**
     * Return only one PDO  instance through the whole project.
     * @return PDO|null (instance) PDO|null
     */
    public static function getInstance(): ?PDO {
        if (null === self::$dbInstance) {
            new self();
        }
        return self::$dbInstance;
    }

    /**
     * Return sanitized string to have secure data to insert into the database.
     * @param $data
     * @return string
     */
    public static function sanitizeString($data): string {
        $data = strip_tags($data);
        $data = addslashes($data);
        return trim($data);
    }

    /**
     * Return sanitized int to have secure data to insert into the database.
     * @param $data
     * @return int
     */
    public static function sanitizeInt($data): int {
        return intval($data);
    }

    /**
     * Check if password is correct
     * @param $mdp
     * @return bool
     */
    public static function checkPassword($mdp): bool {
        $maj = preg_match('@[A-Z]@', $mdp);
        $min = preg_match('@[a-z]@', $mdp);
        $number = preg_match('@[0-9]@', $mdp);
        $special = preg_match('@[^\w]@', $mdp);

        if(!$maj || !$min || !$number || strlen($mdp) < 8 || !$special)
        {
            return false;
        }
        else
            return true;
    }

    /**
     * we prevent letting other developers clone the object
     */
    public function __clone(){}
}