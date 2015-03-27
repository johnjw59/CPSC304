<?php
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();
$base_url = '';

include('conn.php');
include(__DIR__ . '/db.php');
include('game.php');
include('creator.php');
include('platform.php');
include('genre.php');
include('review.php');
include('user.php');

$db = new Database($sql_servername, $sql_username, $sql_password, $sql_database);
$db_games = new Games($db);
$db_platforms = new Platforms($db);
$db_genres = new Genres($db);
$db_reviews = new Reviews($db);
$db_user = new User($db);
$db_creators = new Creators($db);
