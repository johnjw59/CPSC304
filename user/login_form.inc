<?php
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $error = NULL;
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!$email) {
      $error = 'The email you provided doesn\'t appear to be a proper email, please try again';
    }
    $pass = md5($_POST['password']);

    if (!$error) {
      $user = $db_user->login($email, $pass);
      if ($user) {
        $_SESSION['user_id'] = $user->user_id;
      }
      else {
        $error = 'You don\'t appear to have an account yet! You should register for an account.';
      }
    }
  }
?>

<h3>Please login below</h3>
<?php if (isset($error)): ?>
  <div id="error"><?= $error ?></div>
<?php endif; ?>
<form id="login" action="index.php?page=user" method="POST">
  <label>Email</label>
  <input type="email" name="email">

  <label>Password</label>
  <input type="password" name="password">

  <input type="submit" value="Login">
</form>
