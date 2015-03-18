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
      	// example query -------

        $games = $db_games->all();
        foreach($games as $game) {
            echo $game->title . "<br />";
        }

        //-----------------------------------

      	include ("inc/navBar.php");
      	echo "<div id=\"wrapper\">";
      	include ("inc/sideBar.php");

      	// Pages types
        if (!isset($_GET['page'])) 
            $_GET['page'] = 'home';

        switch($_GET['page']) {
            case 'game': {
                $id = $_GET['id'];
                include ("game/game_template.php");
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
