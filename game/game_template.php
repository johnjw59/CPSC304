<?php
    /* Template for a single game */
?>
<div class="mainPage">
    <img class="gameBox" src="img/<?= $game->image_url ?>">
    <div class="infoBox">
        <h1><a href="<?= $game->link() ?>"><?= $game->title ?></a></h1>
        <?php if(isset($_SESSION['user_id']) && $isFavourite): ?>
          <span class="is_favourite"></span>
        <?php else: ?>
          <span class="favourite"><a href="index.php?page=game&id=<?= $game->game_id ?>&addFavourite">Add as Favourite</a></span>
        <?php endif; ?>
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
    <section>
      <h1>Description</h1>
      <?= nl2br($game->description) ?>
    </section>
    <section>
      <h1>Reviews</h1>
      <?php foreach($reviews as $review): ?>
        <div class="review">
          <span class="name"><a href="index.php?page=user&id=<?= $review->user_id ?>"><?= $review->name ?></a></span>
          <span>Rating: <?= $review->rating ?></span>
          <p>
            <?= $review->text ?>
          </p>
        </div>
      <?php endforeach;?> 
    </section>
</div>
