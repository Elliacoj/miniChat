<?php

use App\Classes\DB;
use App\Repository\MessageManager;

require_once $_SERVER['DOCUMENT_ROOT'] . "/require.php";

header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$manager = new MessageManager();
$user_fk = $_SESSION['id'];

switch($requestType) {
    case 'GET':
        echo getMessage($manager);
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'));
        if(isset($data->content, $_SESSION['id'])) {
            $result = $manager->creatMessage(addslashes(DB::sanitizeString($data->content)), $user_fk);
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
                'id' => $message->getId(),
                'content' => $message->getContent(),
                'datetime' => $message->getDatetime(),
                'user' => $message->getUserFk(),
            ];
        }

    }
    return json_encode($response);
}