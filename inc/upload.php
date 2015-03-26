<?php
  $dir = "img/";
  $orig_name = $_FILES["image"]["name"];
  $fname = pathinfo($orig_name, PATHINFO_FILENAME );
  $ext = pathinfo($orig_name, PATHINFO_EXTENSION );
  $target_file = $dir . $fname . '.' . $ext;
  $uploadOk = 1;
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check == false) {
          $error .= "File is not an image.\n";
          $uploadOk = 0;
      }
  }
  // Check if file already exists, and if so, re-name it.
  if (file_exists($target_file)) {
      $i = 0;
      do {
        $i++;
        $target_file = $dir . $fname . $i . '.' . $ext;
      } while (file_exists($target_file));
      $fname = $fname . $i . '.' . $ext;
  }
  // Check file size
  if ($_FILES["image"]["size"] > 500000) {
      $error .= "Sorry, your file is too large.\n";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($ext != "jpg" && $ext != "png" && $ext != "jpeg"
  && $ext != "gif" ) {
      $error .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      $error .= "Sorry, your file was not uploaded.\n";
  // if everything is ok, try to upload file
  } else {
      if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          $error .= "Sorry, there was an error uploading your file\n.";
      }
  }
