<?php 

  session_start();
  include 'Functions/database_connect.php';
  $conn = db_connect();
  $errors = array('global' => '', 'userName' => '', 'password' => '');

  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $authorized = authorize_user($username, $password);
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="Assests/CSS/log.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="admin_verify.php" class="sign-in-form" method="POST">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" />
            </div>
            <?php if(isset($_SESSION['logInError']) && $_SESSION['logInError'] > 0){?>
              <div class="signup-errors"><?php echo $_SESSION['logInError']; ?></div>
            <?php }?>
            <input type="submit" value="Login" class="btn solid" name="login" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              sign up here
            </p>
            <button class="btn transparent" id="sign-up-btn"><a href="signup.php">Sign up</a></button>
          </div>
          <img src="Assests/Images/log.svg" class="image" alt="" />
        </div>
    </div>
  </body>
</html>
