<div class="mainPage">
  <h1>Reviews by <?= $name->name; ?></h1>
  <section>
      <?php foreach($reviews as $review): ?>
        <div class="review">
          <span class="name"><a href="index.php?page=game&id=<?= $review->game_id ?>"><?= $review->title ?></a></span>
          <span>Rating: <?= $review->rating ?></span>
          <p>
            <?= $review->text ?>
          </p>
        </div>
      <?php endforeach;?> 
    </section>
</div>
