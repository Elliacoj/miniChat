<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . "/Classes/DB.php";
require_once $root . "/Entity/User.php";
require_once $root . "/Entity/Message.php";
require_once $root . "/Repository/MessageManager.php";
require_once $root . "/Repository/UserManager.php";
