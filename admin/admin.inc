<?php
  switch($_GET['admin']) {
    case 'addGame':
      echo "<h1>Add a Game</h1>";
      break;

    case 'editGame':
      echo "<h1>Edit a Game</h1>";
      break;

    case 'addCreator':
      echo "<h1>Add a Creator</h1>";
      break;

    case 'editCreator':
      echo "<h1>Edit a Creator</h1>";
      break;

    case 'addPlatform':
      echo "<h1>Add a Platform</h1>";
      break;

    case 'addGenre':
      echo "<h1>Add a Genre</h1>";
      break;

    default:
      // Go home.
      include ("inc/mainPage.php");
      break;
  }
