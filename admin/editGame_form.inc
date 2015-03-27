<div class="left">
  <form id="admin" action="index.php?page=admin&admin=editGame" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">

    <label>Title</label>
    <input type="text" name="title" value="<?= $game->title ?>">
    
    <label>Image</label>
    <input type="file" name="image">
    
    <label>Description</label>
    <textarea name="description"><?= $game->description ?></textarea>
    
    <!-- <label>Creators</label>
    <?php foreach($game_creators as $gc): ?>
        <?php $num_creat++ ?>
        <select name="creator<?= $num_creat ?>">
            <option value=''></option>
          <?php foreach ($creators as $creat): ?>
            <option <?php if($creat->creator_id == $gc->creator_id) { echo 'selected';} ?> value="<?= $creat->creator_id ?>"><?= $creat->company_name ?></option>
          <?php endforeach; ?>
        </select>
    <?php endforeach; ?> -->
    
    <label>Add a Creator</label>
    <select name="creator_new">
        <option selected disabled hidden value=''></option>
      <?php foreach ($creators as $creat): ?>
        <option value="<?= $creat->creator_id ?>"><?= $creat->company_name ?></option>
      <?php endforeach; ?>
    </select>

    <!-- <label>Platforms</label>
    <?php foreach($game_platforms as $gp): ?>
        <?php $num_plat++ ?>
        <select name="platform<?= $num_plat ?>">
          <option value=''></option>
          <?php foreach ($platforms as $plat): ?>
            <option <?php if($plat->platform_id == $gp->platform_id) { echo 'selected';} ?> value="<?= $creat->creator_id ?>"><?= $creat->company_name ?></option>
          <?php endforeach; ?>
        </select>
    <?php endforeach; ?> -->
    
    <label>Add a Platform</label>
    <select name="platform_new" required>
      <option selected disabled hidden value=''></option>
      <?php foreach ($platforms as $plat): ?>
        <option selected disabled hidden value=''></option>
        <option value="<?= $plat->platform_id ?>"><?= $plat->name ?></option>
      <?php endforeach; ?>
    </select>

    <!-- <label>Genre</label>
    <?php foreach($game_genre as $gg): ?>
        <?php $num_gen++ ?>
        <select name="genre<?= $num_gen ?>">
          <option value=''></option>
          <?php foreach ($genres as $gen): ?>
            <option <?php if($gen->genre_id == $gg->genre_id) { echo 'selected';} ?> value="<?= $gen->genre_id ?>"><?= $gen->name ?></option>
          <?php endforeach; ?>
        </select>
    <?php endforeach; ?> -->
    
    <label>Add a Genre</label>
    <select name="genre_new" required>
      <option selected disabled hidden value=''></option>
      <?php foreach ($genres as $gen): ?>
        <option selected disabled hidden value=''></option>
        <option value="<?= $gen->genre_id ?>"><?= $gen->name ?></option>
      <?php endforeach; ?>
    </select>
    
    <label>Release Date</label>
    <input type="date" name="release_date" value="<?= $game->release_date ?>">

    <input type="submit" name="edit_submit" value="Edit Game">
  </form>
</div>

<div class="right">
  <form id="admin-delete" action="index.php?page=admin&admin=editGame" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="hidden" name="title" value="<?= $game->title ?>">

    <label>Delete game?</label>
    <input type="submit" name="delete" value="Delete game">
    <span class="warning">Once you hit this button, the game will be deleted and there's no going back!</span>
  </form>
</div>
