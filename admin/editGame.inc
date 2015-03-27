<?php
  if (!empty($_POST['edit_submit'])) {
    include('inc/upload.php');
    $id = $_POST['id'];
    $game = $db_games->byId($id);
 
    $title = ($game->title != $_POST['title']) ? $_POST['title'] : $game->title;
    $desc = ($game->description != $_POST['description']) ? $_POST['description'] : $game->description;
    $date = ($game->release_date != $_POST['release_date']) ? $_POST['release_date'] : $game->release_date;
    $fname = isset($fname) ? $fname : $game->image_url;

    if (!empty($_POST['creator_new'])) {
        $db_creators->addMadeGame($id, $_POST['creator_new']);
    }
    if (!empty($_POST['platform_new'])) {
        $db_platforms->addGamePlatform($id, $_POST['platform_new']);
    }
    if (!empty($_POST['genre_new'])) {
        $db_genres->addGameGenre($id, $_POST['genre_new']);
    }
    $db_games->updateGame($id, $title, $fname, $desc, $date);
    header('Location: ' . $base_url . '/index.php?page=game&id=' . $id);
  }
  else if (!empty($_POST['delete'])) {
    $db_games->deleteId($_POST['id']);
    echo '<div id="success">' . $_POST['title'] . ' and all references to it have been deleted.</div>';

    $games = $db_games->all();
    include('chooseGame_form.inc');
  }
  else if (!empty($_POST['game_id']) || !empty($_POST['game_select_id'])) {
    $id = empty($_POST['game_id']) ? $_POST['game_select_id'] : $_POST['game_id'];
    $game = $db_games->byId($id);

    $creators = $db_creators->getAll();
    $genres = $db_genres->getAll();
    $platforms = $db_platforms->getAll();

    /*$game_platforms = $db_platforms->gamePlatforms($id);
    $num_plat = 0;
    $game_genre = $db_genres->byGame($id);
    $num_gen = 0;
    $game_creators = $db_games->gameCreators($id);
    $num_creat = 0;*/

    include('editgame_form.inc');
  }
  else {
    $games = $db_games->all();
    include('chooseGame_form.inc');
  }
?>
