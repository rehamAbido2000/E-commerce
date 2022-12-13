<?php
ob_start();
session_start();
    $style = "login.css";
    $script="login.js";
    $boot="no";
    require "init.php";

    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["state"]) && $_POST["state"] == "signin" && !empty($_POST["signin_email"]) && !empty($_POST["signin_password"]) )
{
    $email = filter_var($_POST["signin_email"] , FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST["signin_password"] , FILTER_SANITIZE_STRING);
    $hased = sha1($password);
    check_user($email,$hased);
}else if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["state"]) && $_POST["state"] == "signup" && !empty($_POST["signup_username"]) && !empty($_POST["signup_email"]) && !empty($_POST["signup_password"])){
    $username = filter_var($_POST["signup_username"] , FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["signup_email"] , FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST["signup_password"] , FILTER_SANITIZE_STRING);
    $sup_hased = sha1($password);
    $gender = filter_var($_POST["gender"] , FILTER_SANITIZE_STRING);
    
    /*check if info already added*/

    global $con;
    $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute(array($email));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($count){
        echo "
            <script>
                toastr.error('Sorry Your Email is already excit.')
            </script>";
    }
    else{
    insert_user($username,$email,$sup_hased,$gender);
        
        
    }
}

?>


<div style="position: unset;" class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="signin_email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="signin_password" placeholder="Password" />
            </div>
            <input type="hidden" name="state" value="signin">
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Follow Us in Social Media Platforms</p>
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


          <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="signup_username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="signup_email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="signup_password" placeholder="Password" />
            </div>
            <div class="form-group">
            <i style="text-align: center;
            line-height: 55px;
            color: #acacac;
            transition: 0.5s;
            font-size: 1.1rem;
            margin-right: 5px;" class="fal fa-filter">Gender</i>
            <select class="custom-select ui search dropdown" name="gender" id="gender" required>
                <option selected disable ddefault  value="">Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
            <input type="hidden" name="state" value="signup">
            <input style="margin-top: 30px;" type="submit" class="btn" value="Sign up" />
            <p class="social-text">Follow Us in Social Media Platforms</p>
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
              Now! .. You Can Sign UP in Our Website and Benefit From the Services we Offer .
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/undraw_Social_bio_re_0t9u.svg" class="image" alt="logo" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
            If you have Already Registered your Data Before, you can Sign in .
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/undraw_add_friends_re_3xte.svg" class="image" alt="signup logo" />
        </div>
      </div>
    </div>

<?php 

require_once "./includes/template/footer.php";
ob_end_flush();
