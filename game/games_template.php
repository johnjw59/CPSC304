<?php
    /* Template for a list of all games */
?>
<div class="mainPage">
    <?php foreach($games as $game): ?>
        <div class="gameSection">
            <a href="<?= $game->link() ?>">
                <img class="gameBox thumbnail" src="img/<?= $game->image_url ?>">
            </a>
            <!-- <img class="gameBox" src="img/<?= $game->image_url ?>"> -->
            <div class="infoBox">
                <h1><a href="<?= $game->link() ?>"><?= $game->title ?></a></h1>
                <ul>
                    <li><label>Release Date:</label> <?= $game->release_date ?></li>
                    <li><label>Genre:</label> <?= $game->genres ?></li> 
                    <li><label>Creators:</label> <?= $game->creators ?></li> 
                    <li><label>Platforms:</label> <?= $game->platforms ?></li>
                    <li><label>Rating:</label> <?= $game->getRating() ?></li>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
</div>
