<!DOCTYPE html>
  <html>
  	<?php
  		include ("inc/head.php");
  	?>
    <body>

      <?php 
      	// SQL Connection -------

      	require_once('inc/conn.php'); 
        
        $sql = 'SELECT title
                  FROM game';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo $row['title'] . "<br />";
          }
        }
        else {
          echo $conn->error();
        }
        //-----------------------------------

      	include ("inc/navBar.php");
      	echo "<div id=\"wrapper\">";
      	include ("inc/sideBar.php");

      	// Pages types
      	if ($_GET['page'] == "game"){
      		$id = $_GET['id'];
      		include ("game/game_template.php");
      	}else if ($_GET['page'] == "developer"){
      		include ("developer/index.php");
      	} else if ($_GET['page'] == "admin"){
      		include ("admin/index.php");
      	} else if ($_GET['page'] == "user"){
      		include ("user/index.php");
      	} else {
      		// Home
      		include ("inc/mainPage.php");
      	}
      	echo "</div>";
      ?>

  </body>
</html>
