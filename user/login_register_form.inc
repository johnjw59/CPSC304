<?php
  if (!empty($_POST['login'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
      $error_login = NULL;
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      if (!$email) {
        $error_login = 'The email you provided doesn\'t appear to be a proper email, please try again.';
      }
      $pass = md5($_POST['password']);
  
      // if the email was valid, try to retrieve the user from the database
      if (!$error_login) {
        $user = $db_user->login($email, $pass);
        // if we got a user, log them in!
        if ($user) {
          $_SESSION['user_id'] = $user->user_id;
          // reload the page
          header('Location: /index.php?page=user'); 
        }
        // if we didn't, they must not exist
        else {
          $error_login = 'The email and password you entered are incorrect.';
        }
      }
    }
  }
  else if (!empty($_POST['register'])) {

  }
?>

<div class="left">
  <h3>Login</h3>

  <?php if (isset($error)): ?>
    <div id="error"><?= $error_login ?></div>
  <?php endif; ?>

  <form id="login" action="index.php?page=user" method="POST">
    <label>Email</label>
    <input type="email" name="email" required>
  
    <label>Password</label>
    <input type="password" name="password" required>
  
    <input type="submit" name="login" value="Login">
  </form>
</div>

<div class="right">
  <h3>Register an Account</h3>

  <?php if (isset($error_register)): ?>
    <div id="error"><?= $error_register ?></div>
  <?php endif; ?>

  <form id="register" action="index.php?page=user" method="POST">
    <label>Email</label>
    <input type="email" name="email" required>

    <label>Username</label>
    <input type="text" name="name" required>
  
    <label>Password</label>
    <input type="password" name="password" required>
    <div id="password-warning">This site is meant as a school project only and therefore the security isn't up to current standards. We advise that you don't use your regular password</div>

    <label>Re-Enter Password</label>
    <input type="password" name="password2" required>

    <!-- Captcha! -->
    <!--<div class="g-recaptcha" data-sitekey="6LegywMTAAAAAAC4Pm24HNZ0m2qTqkLIVk54ogd8"></div>-->
  
    <input type="submit" name="register" value="Login">
  </form>
</div>
