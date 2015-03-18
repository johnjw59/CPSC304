<?php
    /* Template for a list of all games */
?>
<div class="mainPage">
    <?php foreach($games as $game): ?>
        <img class="gameBox" src="img/<?= $game->image_url ?>">
        <div class="infoBox">
            <h1><a href="<?= $game->link() ?>"><?= $game->title ?></a></h1>
            <ul>
                <li>Release Date: </li>
                <li>Platforms: </li>
                <li>Genre: </li>
                <li>Developers:</li>
                <li>Publisher:</li>
                <li>Rating: </li>
            </ul>
        </div>
    <?php endforeach; ?>
</div>
