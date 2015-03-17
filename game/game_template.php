<?php 
  include('game.inc');
 ?>

<div class="mainPage">
  <img class="gameBox" src="img/<?php echo $imgURL ?>">
  <div class="infoBox">
    <h1><?= $title ?></h1>
    <ul>
      <li>Release Date: </li>
      <li>Platforms: </li>
      <li>Genre: </li>
      <li>Developers:</li>
      <li>Publisher:</li>
      <li>Rating: </li>
    </ul>
  </div>
  <section><?= $description ?></section>
  <section>Section 2</section>
</div>