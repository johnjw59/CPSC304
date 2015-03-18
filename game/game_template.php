<?php 
  include('game.inc');
?>
<div class="mainPage">
    <?php if($game != null): ?>
        <img class="gameBox" src="img/<?= $game->imgURL ?>">
        <div class="infoBox">
            <h1><?= $game->title ?></h1>
            <ul>
                <li>Release Date: </li>
                <li>Platforms: </li>
                <li>Genre: </li>
                <li>Developers:</li>
                <li>Publisher:</li>
                <li>Rating: </li>
            </ul>
        </div>
        <section><?= $game->description ?></section>
        <section>Section 2</section>
    <?php endif; ?>
</div>
