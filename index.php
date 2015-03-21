<?php
    include_once(__DIR__ . '/inc/init.php');
?>
<!DOCTYPE html>
  <html>
  	<?php
  		include ("inc/head.php");

      if (isset($_GET['logout'])) {
          $_SESSION['user_id'] = NULL;
          session_destroy();
      }
  	?>
    <body>

      <?php 
      	include ("inc/navBar.php");
      	echo "<div id=\"wrapper\">";

        // Pages types
        if (!isset($_GET['page'])) {
            $_GET['page'] = 'home';
        }

        switch($_GET['page']) {
            case 'game':
                include ("inc/sideBar.php");
                include ("game/game.inc");
                break;

            case 'developer':
                include ("inc/sideBar.php");
                include ("developer/index.php");
                break;

            case 'admin': 
                include ("admin/index.php");
                break;

            case 'user':
                include ("user/user.inc");
                break;

            default:
                // Home
                include ("inc/mainPage.php");
                break;
      	}
      	echo "</div>";
      ?>

  </body>
</html>
