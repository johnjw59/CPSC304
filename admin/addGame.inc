<?php
  $error = NULL;

  $developers = $db_creators->getDevelopers();
  $publishers = $db_creators->getPublishers();
  $platforms;
  $genres = $db_genres->getAll();
  $platforms = $db_platforms->getAll();

  if (!empty($_POST['submit'])) {
    //if (isset($_POST['title']) && isset($_POST['image']) && isset($_POST['description']) && isset($_POST['developer']) && isset($_POST['publisher']) && isset($_POST['platform']) && isset($_POST['genre']) && isset($_POST['release_date'])) {

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
  
        /*$id = $db_games->addGame($title, $fname, $desc, $date);
        $db_genre->addGameGenre($id, $genre);
        $db_platform->addGamePlatform($id, $platform);
        $db_creator->addMadeGame($id, $dev);
        $db_creator->addMadeGame($id, $pub);*/
  
        //header('Location: /index.php?page=game&id=' . $id);
      }
    /*}
    else {
      $error .= "All fields are required!\n";
    }*/
  }
?>

<form id="admin" action="index.php?page=admin&admin=addGame" enctype="multipart/form-data" method="POST">
  <?php if ($error): ?>
    <div class="error"><?= $error ?></div>
  <?php endif; ?>

  <label>Title</label>
  <input type="text" name="title" >

  <label>Image</label>
  <input type="file" name="image" >

  <label>Description</label>
  <textarea name="description" ></textarea>

  <label>Developer</label>
  <select name="developer" >
    <?php foreach ($developers as $dev): ?>
      <option selected disabled hidden value=''></option>
      <option value="<?= $dev->creator_id ?>"><?= $dev->company_name ?></option>
    <?php endforeach; ?>
  </select>

  <label>Publisher</label>
  <select name="publisher" >
    <?php foreach ($publishers as $pub): ?>
      <option selected disabled hidden value=''></option>
      <option value="<?= $pub->creator_id ?>"><?= $pub->company_name ?></option>
    <?php endforeach; ?>
  </select>

  <label>Platform</label>
  <select name="platform" >
    <option selected disabled hidden value=''></option>
    <?php foreach ($platforms as $plat): ?>
      <option selected disabled hidden value=''></option>
      <option value="<?= $plat->platform_id ?>"><?= $plat->name ?></option>
    <?php endforeach; ?>
  </select>

  <label>Genre</label>
  <select name="genre" >
    <option selected disabled hidden value=''></option>
    <?php foreach ($genres as $gen): ?>
      <option selected disabled hidden value=''></option>
      <option value="<?= $gen->genre_id ?>"><?= $gen->name ?></option>
    <?php endforeach; ?>
  </select>

  <label>Release Date</label>
  <input type="date" name="release_date" >
  
  <input type="submit" name="submit" value="Add Game">
</form>
