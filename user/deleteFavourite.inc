<?php
  if (isset($_POST['deleteFavourite'])) {
    $db_games->removeFavourite($_GET['uid'], $_GET['gid']);
    header('Location: ' . $base_url . '/index.php');
  }
  
  $game = $db_games->byId($_GET['gid']);
?>

<form id="deleteFavourite" action="index.php?page=deleteFavourite&uid=<?= $_GET['uid'] ?>&gid=<?= $_GET['gid'] ?>" method="POST">
  <p>Are you sure you want to remove <?= $game->title ?> from your favourites?</p>
  <input type="submit" name="deleteFavourite" value="Yes">
  <a href="index.php"><input type="button" value="Nevermind"></a>
</form>
