<head>
	<title>CPSC 304 Project</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<script src='js/lib/jquery/jquery.js'></script>
	<?php

	if (isset($_GET['page']) && $_GET['page'] == 'game'){
		echo '<script src="js/game.js"></script>';
	}
	?>
  <script src='https://www.google.com/recaptcha/api.js'></script>
 </head>
