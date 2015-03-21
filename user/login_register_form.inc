<?php
  // validation and submit function for login form
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
    else {
      $error_login = 'You need to enter a password and email!';
    }
  }
  // validation and submit function for register form
  else if (!empty($_POST['register'])) {
    if (!empty($_POST['email_r']) && !empty($_POST['password_r']) && !empty($_POST['password2']) && !empty($_POST['name'])) {
      $error_register = NULL;
      $email = filter_var($_POST['email_r'], FILTER_SANITIZE_EMAIL);
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
      $pass = ($_POST['password_r'] == $_POST['password2']) ? md5($_POST['password_r']) : false;
      if (!$email) {
        $error_register = 'The email you provided doesn\'t appear to be a proper email, please try again.';
      }
      else if (!$name) {
        $error_register = 'The name you entered is a little strange, maybe try a different one?';
      }
      else if (!$pass) {
        $error_register = 'Your passwords don\'t match!';
      }
  
      // if the email, name and passwords were valid, try to retrieve the user from the database
      if (!$error_register) {
        $user = $db_user->register($email, $name, $pass);
        // if user isn't false, the insert was successful and we can log them in
        if ($user) {
          $_SESSION['user_id'] = $user[0];
          // reload the page
          header('Location: /index.php?page=user');
        }
        // otherwise it wasn't meaning that email is already associated with a user
        else {
          $error_register = 'An account already exists with that email.';
        }
      }
    }
    else {
      $error_register = 'All fields are required to create an account.';
    }
  }
?>

<div id="login-register">
  <div class="left">
    <h3>Login</h3>
  
    <?php if (isset($error_login)): ?>
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
      <input type="email" name="email_r" required>
  
      <label>Username</label>
      <input type="text" name="name" required>
    
      <label>Password</label>
      <input type="password" name="password_r" required>
      <div id="password-warning">This site is meant as a school project only and therefore the security isn't up to current standards. We advise that you don't use your regular password</div>
  
      <label>Re-Enter Password</label>
      <input type="password" name="password2" required>
  
      <!-- Captcha! -->
      <!--<div class="g-recaptcha" data-sitekey="6LegywMTAAAAAAC4Pm24HNZ0m2qTqkLIVk54ogd8"></div>-->
    
      <input type="submit" name="register" value="Login">
    </form>
  </div>
</div>
