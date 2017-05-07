<?php

require_once "../entities/Bird.php";

dbInit();
dropTable(Bird::TABLE);
execSQLQuery(Bird::CREATE_QUERY);

Bird::createBird('Kagu');
Bird::createBird('Palila');
Bird::createBird('Kakapo');
Bird::createBird('New Caledonian Owlet-Nightjar');
Bird::createBird('Californian Condor');
Bird::createBird('Honduran Emerald');
Bird::createBird('Forest Owlet');
Bird::createBird('Orange-Bellied Parrot');
Bird::createBird('Great Indian Bustard');
Bird::createBird('Northern Bald Ibis');
Bird::createBird('Christmas Island Frigatebird');
Bird::createBird('Red-Crowned Crane');
