<?php 
	$number_of_games 	= 4;
	$top_rated 			= $db_games->topRated($number_of_games);
	$recent_games 		= $db_games->recentlyAdded($number_of_games); 
?>

<?php if(isset($_SESSION['user_id'])): ?>
	<?php 
		$user 		= $db_user->byId($_SESSION['user_id']);
		$favorites 	= $db_games->getFavourites($_SESSION['user_id']); 
	?>
	<div class ="welcome"> Hello <?= $user->name ?> </div>
	<?php if($favorites):?>
		<section>
			<h1>Favorite games</h1>
			<?php foreach ($favorites as $game):?>
				<div class="displayBox">
					<a href="<?= $game->link() ?>"><img class="gameBox" src="img/<?= $game->image_url ?>"></a>
				</div>
			<?php endforeach;?>
		</section>
	<?php endif;?>
<?php else: ?>
	<div class ="welcome"> Welcome visitor to our game database!</div>
<?php endif; ?>	
	<section>
		<h1>Top Rated</h1>
		<?php foreach($top_rated as $game): ?>
    		<div class="displayBox">
				<a href="<?= $game->link() ?>"><img class="gameBox" src="img/<?= $game->image_url ?>"></a>
			</div>
      <?php endforeach; ?>
	</section>
	<section>
		<h1>Recently Added</h1>
		<?php foreach($recent_games as $game): ?>
        	<div class="displayBox">
				<a href="<?= $game->link() ?>"><img class="gameBox" src="img/<?= $game->image_url ?>"></a>
			</div>
      	<?php endforeach; ?>
	</section>
