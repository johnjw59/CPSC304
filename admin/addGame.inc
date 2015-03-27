<?php
  $error = NULL;

  $developers = $db_creators->getDevelopers();
  $publishers = $db_creators->getPublishers();
  $genres = $db_genres->getAll();
  $platforms = $db_platforms->getAll();

  if (!empty($_POST['submit'])) {
    if (!empty($_POST['title']) && !empty($_FILES["image"]) && !empty($_POST['description']) && !empty($_POST['developer']) && !empty($_POST['publisher']) && !empty($_POST['platform']) && !empty($_POST['genre']) && !empty($_POST['release_date'])) {

      // try to upload file
      include('inc/upload.php');

      if (!$error) {
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $dev = $_POST['developer'];
        $pub = $_POST['publisher'];
        $plat = $_POST['platform'];
        $genre = $_POST['genre'];
        $date = $_POST['release_date'];
  
        $id = $db_games->addGame($title, $fname, $desc, $date);
        $id = $id[0];
        $db_genres->addGameGenre($id, $genre);
        $db_platforms->addGamePlatform($id, $plat);
        $db_creators->addMadeGame($id, $dev);
        $db_creators->addMadeGame($id, $pub);
  
        header('Location: ' . $base_url . '/index.php?page=game&id=' . $id);
      }
    }
    else {
      $error .= "All fields are required!\n";
    }
  }
?>

<form id="admin" action="index.php?page=admin&admin=addGame" enctype="multipart/form-data" method="POST">
  <?php if ($error): ?>
    <div class="error"><?= $error ?></div>
  <?php endif; ?>

  <label>Title</label>
  <input type="text" name="title" required>

  <label>Image</label>
  <input type="file" name="image" required>

  <label>Description</label>
  <textarea name="description" required></textarea>

  <label>Developer</label>
  <select name="developer" required>
    <option selected disabled hidden value=''></option>
    <?php foreach ($developers as $dev): ?>
      <option value="<?= $dev->creator_id ?>"><?= $dev->company_name ?></option>
    <?php endforeach; ?>
  </select>

  <label>Publisher</label>
  <select name="publisher" required>
    <option selected disabled hidden value=''></option>
    <?php foreach ($publishers as $pub): ?>
      <option value="<?= $pub->creator_id ?>"><?= $pub->company_name ?></option>
    <?php endforeach; ?>
  </select>

  <label>Platform</label>
  <select name="platform" required>
    <option selected disabled hidden value=''></option>
    <?php foreach ($platforms as $plat): ?>
      <option value="<?= $plat->platform_id ?>"><?= $plat->name ?></option>
    <?php endforeach; ?>
  </select>

  <label>Genre</label>
  <select name="genre" required>
    <option selected disabled hidden value=''></option>
    <?php foreach ($genres as $gen): ?>
      <option value="<?= $gen->genre_id ?>"><?= $gen->name ?></option>
    <?php endforeach; ?>
  </select>

  <label>Release Date</label>
  <input type="date" name="release_date" required>
  
  <input type="submit" name="submit" value="Add Game">
</form>
