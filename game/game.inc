<?php
  if ($id) {

      $game = $db_games->byId($id);
      if ($game == null) {
          echo 'no game with id ' . $id;
        }
  } else {
    // R
    $sql = 'SELECT title
            FROM game';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
            echo '<h1>' . $row['title'] . '</h1>';
          }
    }
  }
