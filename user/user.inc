<?php
  if (!empty($_SESSION['user_id'])) {
    include ("inc/sideBar_template.inc");
    echo '<h1>User</h1>';
    echo $_SESSION['user_id'];
  }
  else {
    include('login_register_form.inc');
  }
