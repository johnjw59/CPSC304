<?php
  $developers = $db_creators->getDevelopers();
  $publishers = $db_creators->getPublishers();
  $platforms;
  $genres = $db_genres->getAll();
  $platforms = $db_platforms->getAll();


?>

<form id="admin" action="index.php?page=admin&admin=addGame" method="POST">
  <label>Title</label>
  <input type="text" name="title" required>

  <label>Image</label>
  <input type="file" name="image" required>

  <label>Description</label>
  <textarea name="description" required></textarea>

  <label>Developer</label>
  <select required>
    <?php foreach ($developers as $dev): ?>
      <option selected disabled hidden value=''></option>
      <option value="<?= $dev->creator_id ?>"><?= $dev->company_name ?></option>
    <?php endforeach; ?>
  </select>

  <label>Publisher</label>
  <select required>
    <?php foreach ($publishers as $pub): ?>
      <option selected disabled hidden value=''></option>
      <option value="<?= $pub->creator_id ?>"><?= $pub->company_name ?></option>
    <?php endforeach; ?>
  </select>

  <label>Platform</label>
  <select required>
    <option selected disabled hidden value=''></option>
    <?php foreach ($platforms as $plat): ?>
      <option selected disabled hidden value=''></option>
      <option value="<?= $plat->platform_id ?>"><?= $plat->name ?></option>
    <?php endforeach; ?>
  </select>

  <label>Genre</label>
  <select required>
    <option selected disabled hidden value=''></option>
    <?php foreach ($genres as $gen): ?>
      <option selected disabled hidden value=''></option>
      <option value="<?= $gen->genre_id ?>"><?= $gen->name ?></option>
    <?php endforeach; ?>
  </select>

  <label>Release Date</label>
  <input type="date" name="release_date" required>
  
  <input type="submit" name="submit" value="Add Game">
</form>
