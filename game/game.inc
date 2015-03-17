<?php
  if ($id) {

    $sql = 'SELECT *
            FROM game 
            WHERE game_id =' . $id;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $result = $result->fetch_assoc();
      // Include template
      $title = $result['title'];
      $imgURL = $result['image_url'];
      $description = $result['description'];
      $release_date = $result['release_date'];
    }


    else {
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