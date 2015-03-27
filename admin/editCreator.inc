<?php
  if (!empty($_POST['edit_submit'])) {
    include('inc/upload.php');
    $id = $_POST['id'];
    $creator = $db_creators->byId($id);
    $changed = false;

    $name = ($creator->company_name != $_POST['company_name']) ? $_POST['company_name'] : $creator->company_name;
    $desc = ($creator->description != $_POST['description']) ? $_POST['description'] : $creator->description;
    $type = ($creator->type != $_POST['type']) ? $_POST['type'] : $creator->type;
    $country = ($creator->country != $_POST['country']) ? $_POST['country'] : $creator->country;
    $url = ($creator->website != $_POST['website']) ? $_POST['website'] : $creator->website;
    $year = ($creator->year_founded != $_POST['year_founded']) ? $_POST['year_founded'] : $creator->year_founded;
    $fname = isset($fname) ? $fname : $creator->image_url;
    echo $fname . ' ' . $url;

    $db_creators->updateCreator($id, $name, $type, $desc, $country, $year, $url, $fname);
    header('Location: /index.php?page=developer&id=' . $id);
  }
  else if (!empty($_POST['delete'])) {
    $db_creators->deleteId($_POST['id']);
    echo '<div id="success">' . $_POST['name'] . ' and all references to it have been deleted.</div>';

    $creators = $db_creators->all();
    include('chooseCreator_form.inc');
  }
  else if (!empty($_POST['creator_id']) || !empty($_POST['creator_select_id'])) {
    $id = empty($_POST['creator_id']) ? $_POST['creator_select_id'] : $_POST['creator_id'];
    $creator = $db_creators->byId($id);
    include('editCreator_form.inc');
  }
  else {
    $creators = $db_creators->all();
    include('chooseCreator_form.inc');
  }
?>
