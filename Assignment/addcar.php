<?php
    session_set_cookie_params(0);
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CarsAndBuys.com: Find your dream car today</title>
        <meta name = "viewport" content = "width=device-width">
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
                    echo "<a href='loginpage.php' style='float:right'>Login</a>";
                }
                ?>
                <a href="whoarewe.php">Who are we</a>
                <a href="memberactions.php" style="background-color: #383838;">Member actions</a>
                <a href="main_page.php" style="float:right;">Home</a>
            </div>
        </header>

        <section>
            <div id="test" style="height:180px;">
                <p id="newcar">Add your own car</p>
            </div>
        </section>

        <section>
            <div id="enterbox" style="margin-top: -40px">
                <form action="addcarinfo.php" method="post">
                    <input type="text" name="makeIn" style="text-transform: capitalize;" placeholder="Enter the make" required>
                <input class="findcar" type="submit" value="Add a Car">
                </form>
            </div>
        </section>
    </body>
</html>