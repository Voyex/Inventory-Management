<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Login";

function customPageHeader()
{ ?>
  <!-- Place custom HTML for the head tag here -->
  <link rel="stylesheet" href="/css/login.css" />

<?php }
include_once('template/header.php');
?>
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Login Form</div>
        <div class="title signup">Signup Form</div>
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
          <form action="#" class="login">
            <div class="field">
              <input type="text" placeholder="Email Address" required />
            </div>
            <div class="field">
              <input type="password" placeholder="Password" required />
            </div>
            <div class="password-link"><a href="#">Forgot Password?</a></div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login" />
            </div>
            <div class="signup-link">
              <a href="#">Not a registered user?</a>
            </div>
          </form>
          <form action="#" class="signup">
            <div class="field">
              <input type="text" placeholder="Email Address" required />
            </div>
            <div class="field">
              <input type="password" placeholder="Password" required />
            </div>
            <div class="field">
              <input type="password" placeholder="Confirm Password" required />
            </div>
            <div class="password-link"><a href="#">Forgot Password?</a></div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Signup" />
            </div>
            <div class="signup-link"></div>
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