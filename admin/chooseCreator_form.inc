<form id="admin" action="index.php?page=admin&admin=editCreator" method="POST">
  <p>If you know the id of the creator you want to edit, enter it here</p>
  <input type="text" name="creator_id">

  <p>Otherwise choose one from the list</p>
  <select name="creator_select_id">
    <option selected disabled hidden value=''></option>
    <?php foreach($creators as $creator): ?>
      <option value="<?= $creator->creator_id ?>"><?= $creator->company_name ?></option>
    <?php endforeach; ?>
  </select>
  
  <input type="submit" name="submit" value="Edit Creator">
</form>
