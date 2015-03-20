<?php
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();

include(__DIR__ . '/conn.php');
include(__DIR__ . '/db.php');
include(__DIR__ . '/game.php');
include(__DIR__ . '/platform.php');
include(__DIR__ . '/review.php');
include(__DIR__ . '/user.php');

$db = new Database($sql_servername, $sql_username, $sql_password, $sql_database);
$db_games = new Games($db);
$db_platforms = new Platforms($db);
$db_reviews = new Reviews($db);
$db_user = new User($db);
