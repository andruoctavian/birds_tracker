<?php

require_once "base.php";
require_once ROOT_DIR."/vendor/smarty/smarty/libs/Smarty.class.php";
require_once ROOT_DIR."/src/entities/Post.php";

/** @var Smarty $smarty */
$smarty = new Smarty();
dbInit();
session_start();

if (isUserLoggedIn()) {
    if (isHttpPostRequest()) {
        /** @var User $user */
        $user = User::findUserByUsername(getUsernameLoggedIn());
        if ($_POST['add'] == 'comment') {
            $comment = null;
            try {
                $comment = Comment::createComment(
                    $user->getId(),
                    $_POST['post_id'],
                    $_POST['body']
                );
            } catch (Exception $e) {
                echo false;
            }
            $response = array(
                'profilePic' => $user->getProfilePictureLink(),
                'body' => $comment->getBody(),
                'date' => $comment->getDateTime(),
                'username' => $user->getUsername(),
            );
            echo json_encode($response);
        } else if ($_POST['add'] == 'post') {
            $type = Post::TEXT_TYPE;
            $target_file = "";
            if (!empty($_FILES['file']['tmp_name'])) {
                $target_dir = "/res/img/posts/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                $uploadOk = 1;
                $fileType = pathinfo(ROOT_DIR.$target_file,PATHINFO_EXTENSION);

                // Check if file already exists
                if (file_exists(ROOT_DIR.$target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["file"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($fileType == "jpg" || $fileType == "png" || $fileType == "jpeg" || $fileType == "gif" ) {
                    $type = Post::IMG_TYPE;
                } else if ($fileType = "mp4") {
                    $type = Post::VIDEO_TYPE;
                } else {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], ROOT_DIR.$target_file)) {
                        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

            }

            Post::createPost(
                $user->getId(),
                $_POST['body'],
                $type,
                $target_file
            );
        }
    } else {
        /** @var Post[] $posts */
        $posts = Post::findGalleryPosts();
        $smarty->assign('posts', $posts);
        $smarty->display(ROOT_DIR."/tpl/gallery.tpl");
    }
} else {
    $smarty->display(ROOT_DIR."/tpl/access-denied.tpl");
}