<?php

use App\Classes\DB;
use App\Repository\MessageManager;

require_once $_SERVER['DOCUMENT_ROOT'] . "/require.php";

header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$manager = new MessageManager();

switch($requestType) {
    case 'GET':
        echo getMessage($manager);
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'));
        if(isset($data->content, $_SESSION['id'])) {
            $user_fk = $_SESSION['id'];
            $result = $manager->creatMessage(addslashes(DB::sanitizeString($data->content)), $user_fk);
        }
        break;
    default:
        break;
}

/**
 * Return the students list.
 * @param MessageManager $manager
 * @return false|string
 */
function getMessage(MessageManager $manager): string {
    $response = [];
    $date = strtotime("1 day ago");

    $messages = $manager->getMessage();
    foreach($messages as $message) {
        if($date < strtotime($message->getDatetime())) {
            $response[] = [
                'content' => str_replace("\\", "", $message->getContent()),
                'datetime' => $message->getDatetime(),
                'user' => $message->getUserFk(),
            ];
        }

    }
    return json_encode($response);
}