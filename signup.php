<?php
  session_start();
  include 'Functions/database_connect.php';
  $conn = db_connect();
  $errors = array('global' => '', 'userName' => '', 'password' => '');
  $fullname = $signupUsername = $email = $phone = $password = '';

  if(isset($_POST['signup'])){
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $signupUsername = mysqli_real_escape_string($conn, $_POST['signup_username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['signup_password']);

    if(empty($fullname) || empty($signupUsername) || empty($email) || empty($password)){
      $errors['global'] = "All Field Are Required";
    } else{
      $sql = "SELECT id FROM customer WHERE email = '$email' OR username = '$signupUsername'";
      $result = mysqli_query($conn, $sql);
      $check_email = mysqli_fetch_assoc($result);
      if($check_email){
        $errors['global'] = "Email OR UserName already exists";
        echo "";
      } else{
        add_customer($fullname, $signupUsername, $email, $phone, $password);
      }
    }
    

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
    <div class="signup-container">
      <div class="forms-container">
        <div class="signup">
		  	<form action="signup.php" class="sign-up-form" method="POST" id="signup-form">

            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="fullname" placeholder="Fullname" value="<?php echo $fullname ?>"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="signup_username" placeholder="Username"  value="<?php echo $signupUsername ?>" />
            </div>
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="text" name="phone" placeholder="Phonenumber" value="<?php echo $phone ?>"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email"  value="<?php echo $email ?>"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input
                type="password"
                name="signup_password"
                placeholder="Password"
                value="<?php echo $password ?>"
              />
            </div>
            <?php if($errors['global']): ?>
              <div class="signup-errors"><?php echo $errors['global']; ?></div>
            <?php endif; ?>
            <input type="submit" name="signup" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
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
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
             sign in here 
            </p>
            <button class="btn transparent" id="sign-in-btn"><a href="signin.php">Sign in</a></button>
          </div>
          <img src="Assests/Images/Introimage.svg" class="image" alt="" />
        </div>
      </div>
    </div>
	<script src="Functions/validate.js"></script>


  </body>
</html>
