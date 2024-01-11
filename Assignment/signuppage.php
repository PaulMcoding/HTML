<?php
    session_set_cookie_params(0);
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <title>CarsAndBuys.com: Sign up</title>
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
                  echo "<a href='loginpage.php' style='float:right; background-color: #383838;'>Login</a>";
              }
              ?>
              <a href="whoarewe.php">Who are we</a>
              <a href="memberactions.php">Member actions</a>
              <a href="main_page.php" style="float:right;">Home</a>
          </div>
      </header>

  <div class="signpage" style="height: 360px">
    <h1 style="margin-top: -0px; color: white;">Sign Up</h1>
    <form action="signup.php" method="post">
      <input class="input" type="text" id="name" name="name" placeholder="Username" required><br>

      <input style="margin-top: 5px;" class="input" type="email" id="email" name="email" placeholder="E-mail" required><br>

      <input style="margin-top: 5px;" class="input" type="password" id="password" name="password"
             placeholder="Password"><br>

      <input style="margin-top: 5px;" type="submit" class="input" value="Sign Up">
        <br>

        <?php if(isset($_GET['error']) && $_GET['error'] == 'username_taken'): ?>
            <p style="margin-top: 5px;color: #fc5d5d; font-size:16px; text-align: center;">Username already taken</p>
        <?php endif; ?>

      <a href="loginpage.php"> <input type="button" style="scale:120%;" value="Log in instead">  </a>
    </form>
    </div>
  </body>
</html>
