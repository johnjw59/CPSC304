<?php
  ob_start(); // needed for page redirects
  include_once('inc/init.php');
?>
<!DOCTYPE html>
  <html>
  	<?php
  		include ("inc/head.php");

      if (isset($_GET['logout'])) {
          $_SESSION['user_id'] = NULL;
          $_SESSION['admin'] = NULL;
          session_destroy();
      }
  	?>
    <body>

      <?php
        if (isset($_SESSION['admin']) && ($_SESSION['admin'] == true)) {
          include('admin/adminBar.inc');
        }

      	include ("inc/navBar.php");
      	echo "<div id=\"wrapper\">";

        // Pages types
        if (!isset($_GET['page'])) {
            $_GET['page'] = 'home';
        }

        switch($_GET['page']) {
            case 'game':
                include ("game/game.inc");
                // sidebar has to come after to ensure the sidebar favourites get updated
                include ("inc/sideBar_template.inc");
                break;

            case 'developer':
                include ("inc/sideBar_template.inc");
                include ("developer/developer.inc");
                break;

            case 'admin': 
                if (isset($_SESSION['admin']) && ($_SESSION['admin'] == true)) {
                  include ("admin/admin.inc");
                }
                break;

            case 'user':
                include ("user/user.inc");
                break;

            case 'deleteFavourite':
                include ('user/deleteFavourite.inc');
                break;

            case 'search':
                include('search/search.php');
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
