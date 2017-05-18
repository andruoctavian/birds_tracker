<?php

require_once "../entities/User.php";

dbInit();
dropTable(User::TABLE);
execSQLQuery(User::CREATE_QUERY);

User::createUser('admin', 'admin@mao.com', 'parolaadmin', User::ROLE_ADMIN);
User::createUser('andru', 'andru@mao.com', 'parolaandru');
User::createUser('test', 'test@mao.com', 'parolatest');
