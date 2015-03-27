<?php
  if (!empty($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['description'])) {
      $name = $_POST['name'];
      $desc = $_POST['description'];
  
      $db_genres->addGenre($name, $desc);
      $success = 'Added new genre ' . $_POST['name'] . ' successfully!';
    }
    else {
      $error = "All fields are required!\n";
    }
  }
?>

<form id="admin" action="index.php?page=admin&admin=addGenre" method="POST">
  <?php if (isset($error)): ?>
    <div class="error"><?= $error ?></div>
  <?php endif; ?>

  <?php if (isset($success)): ?>
    <div class="success"><?= $success ?></div>
  <?php endif; ?>

  <label>Name</label>
  <input type="text" name="name" required>

  <label>Description</label>
  <textarea name="description" required></textarea>
  
  <input type="submit" name="submit" value="Add Genre">
</form>
