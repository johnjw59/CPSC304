<?php
  if (!empty($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['manufacturer'])) {
      $name = $_POST['name'];
      $man = $_POST['manufacturer'];
  
      $db_platforms->addPlatform($name, $man);
      $success = 'Added new platform ' . $_POST['name'] . ' successfully!';
    }
    else {
      $error = "All fields are required!\n";
    }
  }
?>

<form id="admin" action="index.php?page=admin&admin=addPlatform" method="POST">
  <?php if (isset($error)): ?>
    <div class="error"><?= $error ?></div>
  <?php endif; ?>

  <?php if (isset($success)): ?>
    <div class="success"><?= $success ?></div>
  <?php endif; ?>

  <label>Name</label>
  <input type="text" name="name" >

  <label>Manufacturer</label>
  <input type="text" name="manufacturer" >
  
  <input type="submit" name="submit" value="Add Platform">
</form>
