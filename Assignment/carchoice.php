<?php
    session_set_cookie_params(0);
    session_start();
?>

<html lang="en">
<head>
    <title>CarsAndBuys.com: Choose your car</title>
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
                echo "<a href='loginpage.php'style='float:right'>Login</a>";
            }
            ?>
            <a href="whoarewe.php">Who are we</a>
            <a href="memberactions.php">Member actions</a>
            <a href="main_page.php" style="float:right;">Home</a>
        </div>
    </header>
    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "assignment";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $choice = $_POST["make"];

        if($choice == 5)
        {
            header("Location: main_page.php?error=bad_choice");
            exit();
        }

        $query = "SELECT modelName, makeName FROM make join model using(makeid) where makeName = '$choice'";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0)
        {
            $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
            ?><div id="bk">

            <?php echo "<p class='newcar'>" . $options[0]['makeName'] . "</p>"; ?>

            <form id="former" action="cardesc.php" method="get">
                    <select name="model">
                        <option disabled selected>Select Model</option>
                        <?php
                        foreach ($options as $option) {
                            ?>
                            <option value="<?php echo $option['modelName']; ?>"> <?php echo $option['modelName']; ?> </option>
                            <?php
                        }
                        ?>
                    </select>
                <input class="findcar" type="submit" value="Find a Car">
            </form>
            </div>

        <?php
        $conn->close();
        }
        ?>
</body>
</html>
