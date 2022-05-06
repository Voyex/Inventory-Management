<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Login";

function customPageHeader()
{ ?>
  <!-- Place custom HTML for the head tag here -->
  <link rel="stylesheet" href="css/login.css" />

<?php }
include_once('template/header.php');
?>

<div class="wrapper black-text">
  <div class="title-text">
    <div class="title login">Login</div>
    <div class="title signup">Signup</div>
  </div>
  <div class="form-container">
    <div class="slide-controls">
      <input type="radio" name="slide" id="login" checked />
      <input type="radio" name="slide" id="signup" />
      <label for="login" class="slide login">Login</label>
      <label for="signup" class="slide signup">Signup</label>
      <div class="slider-tab"></div>
    </div>
    <div class="form-inner">
      <form action="includes/login.inc.php" method="post" class="login">
        <div class="field">
          <input type="text" name="email" placeholder="Email Address" required />
        </div>
        <div class="field">
          <input type="password" name="pwd" placeholder="Password" required />
        </div>
        <div class="pass-link">
          <a href="#">Forgot password?</a>
        </div>
        <div class="field btn">
          <div class="btn-layer"></div>
          <input type="submit" name="submit" value="Login"/>
        </div>
        <div class="signup-link">
          Not a member? <a href="">Signup now</a>
        </div>
      </form>
      <form action="includes/signup.inc.php" method="post" class="signup">
        <div class="field">
          <input type="text" name="email" placeholder="Email Address" required />
        </div>
        <div class="field">
          <input type="password" name="pwd" placeholder="Password" required />
        </div>
        <div class="field">
          <input type="password" name="pwdrepeat" placeholder="Confirm password" required />
        </div>
        <div class="field btn">
          <div class="btn-layer"></div>
          <input
            type="submit" name="submit" value="Signup"/>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  const loginText = document.querySelector(".title-text .login");
  const loginForm = document.querySelector("form.login");
  const loginBtn = document.querySelector("label.login");
  const signupBtn = document.querySelector("label.signup");
  const signupLink = document.querySelector("form .signup-link a");
  signupBtn.onclick = () => {
    loginForm.style.marginLeft = "-50%";
    loginText.style.marginLeft = "-50%";
  };
  loginBtn.onclick = () => {
    loginForm.style.marginLeft = "0%";
    loginText.style.marginLeft = "0%";
  };
  signupLink.onclick = () => {
    signupBtn.click();
    return false;
  };
</script>

<?php include_once('template/footer.php');
