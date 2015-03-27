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
      <p><?= nl2br($developer->description) ?></p>
    </section>
    <section>
    	<?php foreach($games as $game): ?>
            <div class="gameSection">
                <h1><a href="<?= $game->link() ?>"><?= $game->title ?></a></h1>
                <a href="<?= $game->link() ?>">
                    <img class="gameBox" src="img/<?= $game->image_url ?>">
                </a>
                <div class="infoBox">
                    <ul>
                        <li><label>Release Date:</label> <?= $game->release_date ?></li>
                        <li><label>Genre:</label> <?= $game->genres ?></li> 
                        <li><label>Creators:</label> <?= $game->creators ?></li> 
                        <li><label>Platforms:</label> <?= $game->platforms ?></li>
                        <li><label>Rating:</label> <?= $game->getRating() ?></li>
                    </ul>
                </div>
            </div>
    	<?php endforeach;?>
        <div style="clear: both"></div>
    </section>
</div>
