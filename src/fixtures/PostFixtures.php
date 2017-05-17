<?php

require_once "../entities/Post.php";

dbInit();
dropTable(Post::TABLE);
execSQLQuery(Post::CREATE_QUERY);

Post::createPost(1, "Acesta este primul post!", Post::IMG_TYPE, "/res/img/birds/bird1.jpg");