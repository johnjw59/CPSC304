<form id="admin" action="index.php?page=admin&admin=editGame" method="POST">
  <p>If you know the id of the game you want to edit, enter it here</p>
  <input type="text" name="game_id">

  <p>Otherwise choose one from the list</p>
  <select name="game_select_id">
    <option selected disabled hidden value=''></option>
    <?php foreach($games as $game): ?>
      <option value="<?= $game->game_id ?>"><?= $game->title ?></option>
    <?php endforeach; ?>
  </select>
  
  <input type="submit" name="submit" value="Edit Game">
</form>
