<?php

use App\Classes\DB;
use App\Repository\MessageManager;

require_once $_SERVER['DOCUMENT_ROOT'] . "/require.php";

header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$message = new MessageManager();
$user_fk = $_SESSION['id'];

switch($requestType) {
    /*case 'GET':
        if(isset($_GET['id']))
            echo getStudent($manager, intval($_GET['id']));
        else
            echo getStudents($manager);
        break;*/
    case 'POST':
        $data = json_decode(file_get_contents('php://input'));
        if(isset($data->content, $_SESSION['id'])) {
            $result = $message->creatMessage(addslashes(DB::sanitizeString($data->content)), $user_fk);
        }

        break;
    default:
        break;
}



if(isset($_GET['type'], $_POST['content'], $_SESSION['id']) && $_GET['type'] == 'message') {
    $content = DB::sanitizeString($_POST['content']);

    $messageManager = new MessageManager();
    $state = $messageManager->creatMessage($content, $user_fk);
}