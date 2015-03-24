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
        </ul>
    </div>
    <section>
      <h1>Description</h1>
      <?= nl2br($developer->description) ?>
    </section>
    <section>
    	<?php foreach($games as $game): ?>
    		<div>
    			<img class="thumbnail" src="img/<?= $game->image_url ?>">
    			<a href="<?= $game->linkGame()?>"><h3><?= $game->title ?></h3></a>
    		</div>
    	<?php endforeach;?>
    </section>
</div>