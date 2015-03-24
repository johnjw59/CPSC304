<?php
	/* Template for a multiple developers */
?>

<div class="mainPage">
    <?php foreach($developers as $developer): ?>
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
	<?php endforeach;?>
</div>