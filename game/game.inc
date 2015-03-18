<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $game = $db_games->byId($id);
        if ($game == null) {
            echo 'no game with id ' . $id;
        }
        else {
            $platforms = $db_platforms->gamePlatforms($id);
            $reviews = $db_reviews->gameReviews($id);
            include('game_template.php');
        }
    } else {
        $games = $db_games->all();
        include('games_template.php');
    }
