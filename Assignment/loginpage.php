<?php
    session_set_cookie_params(0);
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <title>CarsAndBuys.com: Login</title>
        <link rel="stylesheet"
              href="style.css">
  </head>
  <body>
    <header>
      <h1>CarsAndBuys.com</h1>
      <div class="login">
          <?php if(isset($_SESSION['UID']))
          {
              echo "<a href='getAccount.php'>Account</a>";
              echo "<a href='Logout.php' style='float: right;'>Logout</a>";
          }
          else
          {
              echo "<a href='loginpage.php' style='float: right; background-color: #383838;'>Login</a>";
          }
          ?>
        <a href="whoarewe.php">Who are we</a>
          <a href="memberactions.php">Member actions</a>
        <a href="main_page.php" style="float:right;">Home</a>
      </div>
    </header>

  <div class="logpage" style="height: 325px;">
    <h1 style="margin-top: -0px; color: white;">Login</h1>
    <form action="login.php" method="post">
      <input class="input" type="text" id="username" name="username" placeholder="Username"><br>

      <input style="margin-top: 5px;" class="input" type="password" id="password" name="password"
             placeholder="Password"><br>

      <input style="margin-top: 5px" class="input" type="submit" value="Sign in">
        <?php if(isset($_GET['error']) && $_GET['error'] == 'invalid_username'): ?>
            <p style="margin-top: 5px; color: #ff9999; font-size:18px; text-align: center;">Username not in system</p>
        <?php endif; ?>
        <?php if(isset($_GET['error']) && $_GET['error'] == 'pls_log_in'): ?>
            <p style="margin-top: 5px; color: #ff9999; font-size:18px; text-align: center;">Log in to view accounts</p>
        <?php endif; ?>
      <?php if(isset($_GET['error']) && $_GET['error'] == 'invalid_password'): ?>
        <p style="margin-top: 5px; color: #ff9999; font-size:18px; text-align: center;">Incorrect password</p>
      <?php endif; ?>
        <?php if(isset($_GET['error']) && $_GET['error'] == 'no_car_add'): ?>
            <p style="margin-top: 5px; color: #ff9999; font-size:18px; text-align: center;">Log in to access member actions</p>
        <?php endif; ?>
    <br>
      <a href="signuppage.php"> <input style="top: -50px; scale: 120%;" type="button" value="Sign up instead">  </a>
    </form>
    </div>
  </body>
</html>
