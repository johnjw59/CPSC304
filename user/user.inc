<?php
  if (!empty($_SESSION['user_id'])) {
    include ('inc/sideBar_template.inc');

    $user_id = (isset($_GET['id']) ? $_GET['id'] : $_SESSION['user_id']);
    $name = $db_user->byId($user_id);
    // if the supplied user_id isn't associated with a user, forget all this and load login page
    if (!$name) {
      header('Location: ' . $base_url . '/index.php?page=user');
    }
    $reviews = $db_reviews->byUserId($user_id);

    include('user_template.inc');
  }
  else if (isset($_GET['id'])) {

  }
  else {
    include('login_register_form.inc');
  }
