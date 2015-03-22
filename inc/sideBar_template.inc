<?php
  $number_to_get = 5;
  $top_rated = $db_games->topRated($number_to_get);
  $recent_games = $db_games->recentlyAdded($number_to_get);
  $recent_devs = $db_creators->recentlyAdded($number_to_get);

  if (isset($_SESSION['user_id'])) {
    $favourites = $db_games->getFavourites($_SESSION['user_id']);
  }
?>

<div class="sideBar">
  <?php if($favourites): ?>
    <h3>Your Favourites</h3>
    <ul>
      <?php foreach($favourites as $game): ?>
        <li><a href="<?= $game->link() ?>"><?= $game->title ?></a></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <h3>Top Rated</h3>
    <ul>
      <?php foreach($top_rated as $game): ?>
        <li><a href="<?= $game->link() ?>"><?= $game->title ?></a></li>
      <?php endforeach; ?>
    </ul>

  <h3>Recently Added Games</h3>
    <ul>
      <?php foreach($recent_games as $game): ?>
        <li><a href="<?= $game->link() ?>"><?= $game->title ?></a></li>
      <?php endforeach; ?>
    </ul>

  <h3>Recently Added Developers</h3>
    <ul>
      <?php foreach($recent_devs as $dev): ?>
        <li><a href="<?= $dev->link() ?>"><?= $dev->company_name ?></a></li>
      <?php endforeach; ?>
    </ul>
</div>
