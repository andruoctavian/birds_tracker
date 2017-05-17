<?php

require_once "../entities/Message.php";

dbInit();
dropTable(Message::TABLE);
execSQLQuery(Message::CREATE_QUERY);

Message::createMessage(1, "Acesta este primul mesaj!");