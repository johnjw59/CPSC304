<?php
    /* Template for a single game */
?>
<div class="mainPage">
    <img class="gameBox" src="img/<?= $game->image_url ?>">
    <div class="infoBox">
        <h1><a href="<?= $game->link() ?>"><?= $game->title ?></a></h1>
        <?php if(isset($_SESSION['user_id'])): ?>
          <?php if($isFavourite): ?>
            <span class="is_favourite"></span>
          <?php else: ?>
            <span class="favourite"><a href="index.php?page=game&id=<?= $game->game_id ?>&addFavourite">Add as Favourite</a></span>
          <?php endif; ?>
        <?php endif; ?>
        <ul>
            <li><label>Release Date:</label> <span class="value"><?= $game->release_date ?></span></li>
            <li><label>Platforms:</label> <?= $game->platforms ?></li>
            <li><label>Genre: <?= $game->genres ?></label> </li>
            <li><label>Developers/Publishers: <?= $game->creators ?></label> </li>
            <li><label>Rating: <?= $game->getRating() ?></label</li>
        </ul>
    </div>
    <section>
      <h1>Description</h1>
      <?= nl2br($game->description) ?>
    </section>
    <section>
      <h1>Reviews</h1>
      <?php if(isset($_SESSION['user_id'])): ?>
        <button class="addReview _addReview">Add Review</button>
        <div class="reviewForm _reviewForm">
        <form action="index.php?page=game&id=<?=$game->game_id?>&review=true" method="post">
          <textarea name="reviewText" class="reviewText"></textarea>
          <select name="rating" >
            <option value="0" selected>0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
          <input type="submit">
        </form>
        </div>
      <?php endif; ?>
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
