<div class="left">
  <form id="admin" action="index.php?page=admin&admin=editCreator" enctype="multipart/form-data" method="POST">
    <label>Company Name</label>
    <input type="text" name="company_name" value="<?= $creator->company_name ?>">
  
    <label>Image</label>
    <input type="file" name="image">
  
    <label>Description</label>
    <textarea name="description"><?= $creator->description ?></textarea>
  
    <label>Type</label>
    <select name="type">
        <option value="developer" <?php if ($creator->type == 'developer') { echo 'selected'; } ?>>Developer</option>
        <option value="publisher" <?php if ($creator->type == 'publisher') { echo 'selected'; } ?>>Publisher</option>
        <option value="both" <?php if ($creator->type == 'both') { echo 'selected'; } ?>>Both</option>
    </select>
  
    <label>Country</label>
    <input type="text" name="country" value="<?= $creator->country ?>">
  
    <label>Website</label>
    <input type="text" name="website" value="<?= $creator->website ?>">
  
    <label>Year Founded</label>
    <input type="number" name="year_founded" min="1850" max="<?= date('Y') ?>" value="<?= $creator->year_founded ?>">
  
    <input type="hidden" name="id" value="<?= $id ?>">
    
    <input type="submit" name="edit_submit" value="Edit Creator">
  </form>
</div>

<div class="right">
  <form id="admin-delete" action="index.php?page=admin&admin=editCreator" method="POST">
    <label>Delete Creator?</label>
    <input type="submit" name="delete" value="Delete Creator">
    <span class="warning">Once you hit this button, the creator will be deleted and there's no going back!</span>
  </form>
</div>
