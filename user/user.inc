<?php
  if (!empty($_SESSION['user_id'])) {
    echo '<h1>User</h1>';
  }
  else {
    include('login_register_form.inc');
  }
