<?php

namespace App\Repository;

use App\Classes\DB;
use App\Entity\User;

class UserManager
{
    /**
     * Create a User in the table user
     * @param $username
     * @param $password
     * @return bool
     */
    public function creatUser($username, $password): bool {
        $stmt = DB::getInstance()->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        return $stmt->execute();
    }

    /**
     * Search a User in the table user by the username
     * @param $username
     * @return object
     */
    public function searchUser($username): object
    {
        $stmt = DB::getInstance()->prepare("SELECT * FROM user WHERE username = '$username' LIMIT 1");

        if($stmt->execute()){
            $userData = $stmt->fetch();
            $user = new User($userData['id'], $userData['username'], $userData['password']);
        }
        else {
            $user = null;
        }
        return $user;
    }

    /**
     * Search a User in the table user by the id
     * @param $id
     * @return object
     */
    public function searchUserId($id): User
    {
        $stmt = DB::getInstance()->prepare("SELECT * FROM user WHERE id = '$id' LIMIT 1");

        if($stmt->execute()){
            $userData = $stmt->fetch();
            $user = new User($userData['id'], $userData['username'], $userData['password']);
        }
        else {
            $user = null;
        }
        return $user;
    }
}