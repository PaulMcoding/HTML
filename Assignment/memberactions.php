<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CarsAndBuys.com: Member choices</title>
  <link rel="stylesheet"
        href="style.css">
  <style>
    button
    {
      width: 200px;
      scale: 150%;
      margin: 30px 0 0 100px;
      border: 1px solid #e7d5d5;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      background-color: white;
    }

  </style>
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
      echo "<a href='loginpage.php' style='float:right'>Login</a>";
      }
      ?>
      <a href="whoarewe.php">Who are we</a>
      <a href="memberactions.php" style="background-color: #383838;">Member actions</a>
      <a href="main_page.php" style="float:right;">Home</a>
    </div>
  </header>
  <?php if(isset($_SESSION['UID']))
  {?>
  <div style="background-color: #5c5c5c; border: 6px solid #e5e0e0; border-radius: 15px; margin:200px 0 0 550px; width:400px; height: 250px;">
    <h1 style="text-align: center; color: white;">Choices: </h1>
    <button onclick="window.location.href = 'addcar.php';">Add car</button>
    <br>
    <button onclick="window.location.href = 'editcar.php';">Edit/Delete cars</button>
    <br>
  </div>
    <?php
  }
  else
  {
    header("location: loginpage.php?error=no_car_add");
  }?>

</body>
</html>