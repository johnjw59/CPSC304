<?php
  switch($_GET['admin']) {
    case 'addGame':
      echo "<h1>Add a Game</h1>";
      include('addGame.inc');
      break;

    case 'editGame':
      echo "<h1>Edit a Game</h1>";
      include('editGame.inc');
      break;

    case 'addCreator':
      echo "<h1>Add a Creator</h1>";
      include('addCreator.inc');
      break;

    case 'editCreator':
      echo "<h1>Edit a Creator</h1>";
      include('editCreator.inc');
      break;

    case 'addPlatform':
      echo "<h1>Add a Platform</h1>";
      include('addPlatform.inc');
      break;

    case 'addGenre':
      echo "<h1>Add a Genre</h1>";
      include('addGenre.inc');
      break;

    default:
      // Go home.
      include ("inc/mainPage.php");
      break;
  }
