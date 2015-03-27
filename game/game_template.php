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
            <li><label>Genre:</label> <?= $game->genres ?> </li>
            <li><label>Developers:</label> <?= $game->creators ?> </li>
            <li><label>Publisher:</label> <?= $game->publishers?></li>
            <li><label>Rating:</label> <?=$game->rating?></li>
        </ul>
    </div>
    <section>
      <h1>Description</h1>
      <p><?= nl2br($game->description)?>
      </p>
    </section>
    <section>
      <h1>Reviews</h1>
      <?php if(isset($_SESSION['user_id'])): ?>
        <button class="addReview _addReview">Add Review</button>
        <div class="reviewForm _reviewForm">
        <form action="index.php?page=game&id=<?=$game->game_id?>&review=true" method="post">
          <div>Comment: </div>
          <textarea name="reviewText" class="reviewText"></textarea>
          <div>Rating:
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
          </div>
          <input class="addReview" type="submit">
        </form>
        </div>
      <?php endif; ?>
      <?php foreach($reviews as $review): ?>
        <div class="review">
          <span class="name"><a href="index.php?page=user&id=<?= $review->user_id ?>"><?= $review->name ?></a></span>
          <span><label>Rating:</label> <?= $review->rating ?></span>
          <p>
            <?= $review->text ?>
          </p>
        </div>
      <?php endforeach;?> 
    </section>
</div>
