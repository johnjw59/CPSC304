<!DOCTYPE html>
  <html>
    <body>
      <?php
        if (array_key_exists('id', $_GET)) {
          require_once('../inc/conn.php');
          $id = $_GET['id'];

          $sql = 'SELECT title
                  FROM game
                  WHERE game_id =' . $id;
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();
            echo '<h1>' . $result['title'] . '</h1>';
          }
          else {
            echo 'no game with id ' . $id;
          }

          $conn->close();
        }

        else {
          echo 'no id specified';
        }
      ?>

  </body>
</html>
