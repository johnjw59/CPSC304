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

            if (isset($_SESSION['user_id'])) {
                //----------Favourites------------
                // add this game as a favourite of the user
                if (isset($_GET['addFavourite'])) {
                   $db_games->addFavourite($_SESSION['user_id'], $id); 
                }
                // boolean saying if this game is favourited by the current user
                $isFavourite = $db_games->isFavourite($_SESSION['user_id'], $id);

                //--------Review---------------
                if(isset($_GET['review'])){
                    $user_id = $_SESSION['user_id']; 
                    $text = $_POST['reviewText'];
                    $rating = $_POST['rating'];
                    
                    //Add review
                    $db_reviews->addReview($user_id,$id,$text,$rating);
                }
            }

            include('game_template.php');
        }
    } else {
        $games = $db_games->all();
        include('games_template.php');
    }
