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
                <a href="memberactions.php">Member actions</a>
                <a href="main_page.php" style="float:right; background-color: #383838;">Home</a>
            </div>
        </header>


        <section>
            <div id="test" style="height:200px;">
                <p id="newcar">Find your dream car today</p>
            </div>
        </section>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "assignment";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT makeName FROM make order by makeName";
        $result = $conn->query($query);
        ?>

        <section>
            <div id="enterbox" style="margin-top: -30px; scale: 200%; margin-left:20px;">
                <form action="carchoice.php" method="post">
                <select name="make" id="make">
                    <option value="5" selected>Make</option>
                    <?php
                    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($options as $option) {
                        ?>
                        <option value="<?php echo $option['makeName']; ?>"> <?php echo $option['makeName']; ?> </option>
                        <?php
                    }
                    ?>
                </select>
                <input class="findcar" type="submit" value="Find a Car" >
                </form>
            </div>
            <?php if(isset($_GET['error']) && $_GET['error'] == 'bad_choice'): ?>
                <p style="margin-top: -32px;color: #ff9999; font-size:20px; text-align: center; top: 2px;">Please choose a Make</p>
            <?php endif; ?>
            <?php if(isset($_GET['error']) && $_GET['error'] == 'invalid_password'): ?>
                <p style="margin-top: -32px;color: #ff9999; font-size:20px; text-align: center; top: 2px;">Please choose a Model</p>
            <?php endif; ?>
            <?php if(isset($_GET['error']) && $_GET['error'] == 'del'): ?>
                <p style="margin-top: -32px;color: #a0ff99; font-size:20px; text-align: center; top: 2px;">
                    Account deleted successfully</p>
            <?php endif; ?>
            <?php if(isset($_GET['ticker']) && $_GET['ticker'] == 'car_added'): ?>
                <p style="margin-top: -32px;color: #a0ff99; font-size:20px; text-align: center; top: 2px;">Car added successfully</p>
            <?php endif; ?>
            <?php if(isset($_GET['ticker']) && $_GET['ticker'] == 'car_edited'): ?>
                <p style="margin-top: -32px;color: #a0ff99; font-size:20px; text-align: center; top: 2px;">Car edited successfully</p>
            <?php endif; ?>
            <?php if(isset($_GET['ticker']) && $_GET['ticker'] == 'del'): ?>
                <p style="margin-top: -32px;color: #a0ff99; font-size:20px; text-align: center; top: 2px;">Car deleted successfully</p>
            <?php endif; ?>
            <?php if(isset($_GET['error']) && $_GET['error'] == 'unable'): ?>
                <p style="margin-top: -32px;color: #ff9999; font-size:20px; text-align: center; top: 2px;">Unable to edit car</p>
            <?php endif; ?>
        </section>
    </body>
</html>