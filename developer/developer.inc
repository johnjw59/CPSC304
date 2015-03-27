<?php
	if(isset($_GET['id'])){
		$id 		= $_GET['id'];
		$developer 	= $db_creators->byId($id);
		if($developer == null){
			echo 'No Developer with id '.$id;
		}
		else {
			/* Some additional info about Devs */
			$games = $db_games->byCreator($id);
			include('developer_template.php');
		}
	} else {
		$developers = $db_creators->all();
		include('developers_template.php');
	}

