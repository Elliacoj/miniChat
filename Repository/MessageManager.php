<?php

namespace App\Repository;

use App\Classes\DB;

class MessageManager
{
    /**
     * Create a Message in the table message
     * @param $content
     * @param $user_fk
     * @return bool
     */
    public function creatMessage($content, $user_fk): bool {
        $stmt = DB::getInstance()->prepare("INSERT INTO message (content, user_fk) VALUES (:content, :user_fk)");
        $stmt->bindValue(':content', $content);
        $stmt->bindValue(':user_fk', $user_fk);
        return $stmt->execute();
    }

    /**
     * Create a table of objects Message
     * @return array
     */
    public function getMessage(): array {
        $stmt = DB::getInstance()->prepare("SELECT * FROM message");
        $messages = [];
        if($stmt->execute()) {
            foreach ($stmt->fetchAll() as $message) {
                 $messages[] = $messageManager = new MessageManager($message['id'], $message['content'], $message['datetime'], $message['user_fk']);
            }
        }
        return $messages;
    }
}