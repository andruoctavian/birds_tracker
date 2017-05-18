<?php

require_once "base.php";
require_once ROOT_DIR."/vendor/smarty/smarty/libs/Smarty.class.php";
require_once ROOT_DIR."/src/entities/Post.php";

/** @var Smarty $smarty */
$smarty = new Smarty();
dbInit();
session_start();

if (isUserLoggedIn()) {
    /** @var User $user */
    $user = User::findUserByUsername(getUsernameLoggedIn());
    if (isHttpPostRequest()) {
        if ($_POST['remove'] == 'comment') {
            /** @var Comment $comment */
            $comment = Comment::findComment($_POST['id']);
            $comment->delete();
        } else if ($_POST['remove'] == 'post') {
            /** @var Post $post */
            $post = Post::findPost($_POST['id']);
            $post->delete();
        }
    } else {
        /** @var Post[] $posts */
        $posts = Post::findGalleryPosts();
        $smarty->assign('posts', $posts);
        $smarty->display(ROOT_DIR."/tpl/management.tpl");
    }
} else {
    $smarty->display(ROOT_DIR."/tpl/access-denied.tpl");
}