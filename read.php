<?php

use App\Classes\DB;
use App\Repository\UserManager;

require_once "require.php";

if (isset($_GET['error'], $_POST['username'], $_POST['password']) && $_GET['error'] == '0') {
    $username = DB::sanitizeString($_POST['username']);
    $password = DB::sanitizeString($_POST['password']);

    $user = new UserManager();
    $user = $user->searchUser($username);

    if($user !== null) {
        if(password_verify($password, $user->getPassword())) {
            $_SESSION['id'] = $user->getId();
            $_SESSION['username'] = $user->getUsername();
            header('location: index.php');
        }
        else {
            header('location: index.php?error=2');
        }
    }
    else {
        header('location: index.php?error=3');
    }
}