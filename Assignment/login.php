<?php
    session_set_cookie_params(0);
    session_start();
?>

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
            echo "<a href='loginpage.php'style='float: right; background-color: #383838;'>Login</a>";
        }
        ?>
        <a href="whoarewe.php">Who are we</a>
        <a href="memberactions.php">Member actions</a>
        <a href="main_page.php" style="float:right;">Home</a>
    </div>
</header>
<div>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignment";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    $name = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT `Password` FROM `users` WHERE `UserName` = '$name'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row["Password"];
        if ($password == $stored_password) {
            $sQuery = "SELECT UID from users where UserName = '$name'";
            $result = mysqli_query($conn, $sQuery);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['UID'] = $row['UID'];
            header("Location: main_page.php");
        } else {
            header("Location: loginpage.php?error=invalid_password");
            $conn->close();
            exit;
        }
    }
    else
    {
        header("Location: loginpage.php?error=invalid_username");
        $conn->close();
        exit;
    }
    ?>
</div>
</body>
</html>

