<?php
    /* Template for a single game */
?>
<div class="mainPage">
    <img class="gameBox" src="img/<?= $game->image_url ?>">
    <div class="infoBox">
        <h1><a href="<?= $game->link() ?>"><?= $game->title ?></a></h1>
        <ul>
            <li><label>Release Date:</label> <span class="value"><?= $game->release_date ?></span></li>
            <li><label>Platforms:</label> 
                <ul>
                    <?php foreach($platforms as $platform): ?>
                        <li><?= $platform->name ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><label>Genre:</label> </li>
            <li><label>Developers:</label> </li>
            <li><label>Publisher:</label> </li>
            <li><label>Rating:</label</li>
        </ul>
    </div>
    <section><?= nl2br($game->description) ?></section>
    <section>Section 2</section>
</div>
