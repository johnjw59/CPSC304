<?php
error_reporting(-1);
ini_set('display_errors', 'On');

include(__DIR__ . '/conn.php');
include(__DIR__ . '/db.php');
include(__DIR__ . '/game.php');
include(__DIR__ . '/platform.php');

$db = new Database($sql_servername, $sql_username, $sql_password, $sql_database);
$db_games = new Games($db);
$db_platforms = new Platforms($db);
