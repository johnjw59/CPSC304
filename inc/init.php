<?php

error_reporting(-1);
ini_set('display_errors', 'On');

include(__DIR__ . '/conn.php');
include(__DIR__ . '/game.php');

$db_games = new Games($db);
