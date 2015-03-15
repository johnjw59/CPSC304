<?php
  $servername = 'localhost';
    $username = 'jwiebeca_cpsc304';
    $password = 'P[q!O%e;q4z7';
    $database = 'jwiebeca_cpsc304';
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } 
