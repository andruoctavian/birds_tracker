<?php

require_once "../entities/Comment.php";

dbInit();
dropTable(Comment::TABLE);
execSQLQuery(Comment::CREATE_QUERY);

Comment::createComment(1, 1, "Acesta este primul comentariu!");