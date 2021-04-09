<?php

namespace App\Repository;

use App\Classes\DB;

class UserManager
{
    /**
     * Create a User in the table user
     * @param $username
     * @param $password
     */
    public function creatUser($username, $password) {
        $stmt = DB::getInstance()->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
    }

    /**
     * Search a User in the table user
     * @param $username
     */
    public function searchUser($username) {
        $stmt = DB::getInstance()->prepare("SELECT * FROM user WHERE username = $username");
        $stmt->execute();
    }
}