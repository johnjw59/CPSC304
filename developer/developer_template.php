<?php
	/* Template for a single developer */
?>
<div class="mainPage">
    <img class="gameBox" src="img/<?= $developer->image_url ?>">
    <div class="infoBox">
        <h1><a href="<?= $developer->link() ?>"><?= $developer->company_name ?></a></h1>
        <ul>
            <li><label>Country:</label> <span class="value"><?= $developer->country ?></span></li>
            <li><label>Year Founded:</label><?= $developer->year_founded ?> </li>
            <li><label>Website:</label><a href="<?= $developer->website ?>"><?=$developer->website?></a></li>
            <li><label>Date Added:</label><?= $developer->date_added ?></li>
            <li><label>Average Game Rating:</label><?= $avg_rating ?></li>
            <li><label>Max Rated Game:</label><a href="<?= $max_game->linkGame(); ?>"><?= $max_game->title ?></a></li>
        </ul>
    </div>
    <section>
      <h1>Description</h1>
      <?= nl2br($developer->description) ?>
    </section>
    <section>
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
    	<?php endforeach;?>
        <div style="clear: both"></div>
    </section>
</div>
