<!DOCTYPE html>
  <html>
    <body>

      <h1>Hello World!</h1>
      <?php
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

        $conn->close();
      ?>

  </body>
</html>
