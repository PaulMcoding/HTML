<?php
    session_set_cookie_params(0);
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CarsAndBuys.com: Who are we</title>
          <link rel="stylesheet"
              href="whoarewe.css">
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
                <a href="whoarewe.php" style="background-color: #383838;">Who are we</a>
                <a href="memberactions.php">Member actions</a>
                <a href="main_page.php" style="float:right;">Home</a>
            </div>
        </header>

          <section>
            <div class="whoarewe" style="height: 350px">
            <h1><br>Here at Cars and Buys we have descriptions of high end vehicles tailored for your enjoyment.
                <br><br>Think of it like a dictionary for the car world.
                <br><br>This website has been created by members of the car community, and we request that you ensure
                the accuracy of any information you provide.
            </h1>
            </div>
          </section>
</body>
</html>