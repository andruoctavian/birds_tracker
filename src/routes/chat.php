<?php

require_once "base.php";
require_once ROOT_DIR."/vendor/smarty/smarty/libs/Smarty.class.php";
require_once ROOT_DIR."/src/entities/Message.php";

/** @var Smarty $smarty */
$smarty = new Smarty();
dbInit();
session_start();

if (isUserLoggedIn()) {
    /** @var User $user */
    $user = User::findUserByUsername(getUsernameLoggedIn());
    if (isHttpPostRequest()) {
        $message = null;
        try {
            $message = Message::createMessage(
                $user->getId(),
                $_POST['msg']
            );
        } catch (Exception $e) {
            echo false;
        }
        $response = array(
            'profilePic' => $user->getProfilePictureLink(),
            'body' => $message->getBody(),
            'date' => $message->getDateTime(),
            'title' => "by {$message->getUser()->getUsername()} at {$message->getDateTime()}",
        );
        echo json_encode($response);
    } else {
        if (isset($_GET['refresh'])) {
            /** @var Message[] $messages */
            $messages = array_map(function (Message $m) {
                return array(
                    'profilePic' => $m->getUser()->getProfilePictureLink(),
                    'body' => $m->getBody(),
                    'date' => $m->getDateTime(),
                    'title' => "by {$m->getUser()->getUsername()} at {$m->getDateTime()}",
                    'user' => $m->getUser()->getId()
                );
            }, Message::findChatMessages());
            echo json_encode(array(
                'messages' => $messages,
                'userId' => $user->getId()
            ));
        } else {
            $messages = Message::findChatMessages();
            $smarty->assign('messages', $messages);
            $smarty->assign('username', getUsernameLoggedIn());
            $smarty->display(ROOT_DIR."/tpl/chat.tpl");
        }
    }
} else {
    $smarty->display(ROOT_DIR."/tpl/access-denied.tpl");
}