<?php

require_once "../entities/Report.php";

dbInit();
dropTable(Report::TABLE);
execSQLQuery(Report::CREATE_QUERY);

Report::createReport(1, 2, 23.45, 36.44);