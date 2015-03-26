<?php
  $error = NULL;
  if (!empty($_POST['submit'])) {
    if (!empty($_POST['company_name']) && !empty($_FILES["image"]) && !empty($_POST['description']) && !empty($_POST['type']) && !empty($_POST['country']) && !empty($_POST['website']) && !empty($_POST['year_founded'])) {

      // try to upload file
      include('inc/upload.php');

      if (!$error) {
        $name = $_POST['company_name'];
        $desc = $_POST['description'];
        $type = $_POST['type'];
        $country = $_POST['country'];
        $url = $_POST['website'];
        $year = $_POST['year_founded'];
  
        $id = $db_creators->addCreator($name, $type, $desc, $country, $year, $url, $fname);
        $id = $id[0];
  
        header('Location: /index.php?page=developer&id=' . $id);
      }
    }
    else {
      $error .= "All fields are required!\n";
    }
  }
?>

<form id="admin" action="index.php?page=admin&admin=addCreator" enctype="multipart/form-data" method="POST">
  <?php if ($error): ?>
    <div class="error"><?= $error ?></div>
  <?php endif; ?>

  <label>Company Name</label>
  <input type="text" name="company_name" required>

  <label>Image</label>
  <input type="file" name="image" required>

  <label>Description</label>
  <textarea name="description" required></textarea>

  <label>Type</label>
  <select name="type" required>
      <option selected disabled hidden value=''></option>
      <option value="developer">Developer</option>
      <option value="publisher">Publisher</option>
      <option value="both">Both</option>
  </select>

  <label>Country</label>
  <input type="text" name="country" required>

  <label>Website</label>
  <input type="url" name="website" required>

  <label>Year Founded</label>
  <input type="number" name="year_founded" min="1850" max="<?= date('Y') ?>" required>
  
  <input type="submit" name="submit" value="Add Creator">
</form>
