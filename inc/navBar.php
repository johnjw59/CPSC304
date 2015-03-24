<div class="navBar">
	<div class="button"><a href="index.php">Main</a></div>
	<div class="button"><a href="index.php?page=game">Games</a></div>
	<div class="button"><a href="index.php?page=developer">Developers</a></div>
  <?php if(!empty($_SESSION['user_id'])): ?>
	  <div class="button"><a href="index.php?page=user">Your Account</a></div>
    <div class="button"><a href="index.php?logout">Log out</a></div>
  <?php else: ?>
    <div class="button"><a href="index.php?page=user">Login</a></div>
  <?php endif; ?>

	<form class="search" action="index.php?page=search" method="post">
		<span class="searchBar"><input type="text" name="query" id="search_id"> </span>
		<input class="searchButton" type="submit" value="Search">
	</form>
</div>
