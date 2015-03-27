<?php
    /* Template for a list of all games */
?>
<div class="mainPage">
    <?php foreach($games as $game): ?>
        <div class="gameSection">
            <a href="<?= $game->link() ?>">
                <img class="gameBox" src="img/<?= $game->image_url ?>">
            </a>
            <!-- <img class="gameBox" src="img/<?= $game->image_url ?>"> -->
            <div class="infoBox">
                <h1><a href="<?= $game->link() ?>"><?= $game->title ?></a></h1>
                <ul>
                    <li>Release Date: <?= $game->release_date ?></li>
                    <li>Genre: <?= $game->genres ?></li> 
                    <li>Creators: <?= $game->creators ?></li> 
                    <li>Platforms: <?= $game->platforms ?></li>
                    <li>Rating: <?= $game->getRating() ?></li>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
</div>
