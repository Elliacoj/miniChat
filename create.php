<?php

use App\Classes\DB;
use App\Repository\UserManager;

require_once "require.php";

if (isset($_GET['error'], $_POST['username'], $_POST['password']) && $_GET['error'] == '0') {
    $username = DB::sanitizeString($_POST['username']);
    $password = password_hash(DB::sanitizeString($_POST['password']), PASSWORD_BCRYPT);

    $userManager = new UserManager();
    $state = $userManager->creatUser($username, $password);

    if($state) {
        header("location: index.php?error=0");
    }
    else {
        header("location: index.php?error=1");
    }
}