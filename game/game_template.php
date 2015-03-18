<?php
    /* Template for a single game */
?>
<div class="mainPage">
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
    <section><?= $game->description ?></section>
    <section>Section 2</section>
</div>
