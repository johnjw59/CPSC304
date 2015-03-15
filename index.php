<!DOCTYPE html>
  <html>
    <body>

      <h1>Hello World!</h1>
      <?php
        $servername = "localhost";
        $username = "jwiebeca_cpsc304";
        $password = "P[q!O%e;q4z7";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "SELECT title
                  FROM games";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo $row['title'] . "<br />";
          }
        }

        $conn->close();
      ?>

  </body>
</html>
