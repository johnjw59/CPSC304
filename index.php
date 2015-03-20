<?php
    include_once(__DIR__ . '/inc/init.php');
?>
<!DOCTYPE html>
  <html>
  	<?php
  		include ("inc/head.php");
  	?>
    <body>

      <?php 
      	include ("inc/navBar.php");
      	echo "<div id=\"wrapper\">";
      	include ("inc/sideBar.php");

      	// Pages types
        if (!isset($_GET['page'])) 
            $_GET['page'] = 'home';

        switch($_GET['page']) {
            case 'game': {
                include ("game/game.inc");
                break;
            }
            case 'developer': {
                include ("developer/index.php");
                break;
            }
            case 'admin': {
                include ("admin/index.php");
                break;
            }
            case 'user': {
                include ("user/index.php");
                break;
            }
            case 'login': {
              include ('user/login.inc');
              break;
            }
            default: {
                // Home
                include ("inc/mainPage.php");
                break;
            }
      	}
      	echo "</div>";
      ?>

  </body>
</html>
