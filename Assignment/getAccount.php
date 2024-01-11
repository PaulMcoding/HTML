<?php
    session_set_cookie_params(0);
    session_start();

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
    ?>

<html lang="en">
<head>
    <title>CarsAndBuys.com: Account data</title>
    <link rel="stylesheet"
          href="accountstyle.css">
</head>
<body>
<header>
    <h1>CarsAndBuys.com</h1>
    <div class="login">
        <?php if(isset($_SESSION['UID']))
        {
            echo "<a href='getAccount.php' style='background-color: #383838;'>Account</a>";
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
    <div style="margin-top: 200px; font-size: 3px; color: white;">
        <?php if(isset($_GET['error']) && $_GET['error'] == 'unable'): ?>
            <p style="scale: 120%; margin: 10px 0 0 690px;color: #ff9999; font-size:16px; background-color: white; width: 130px;">
                Unable to edit user</p>
        <?php endif; ?>
        <?php if(isset($_GET['message']) && $_GET['message'] == 'tick'): ?>
            <p style="scale: 120%; margin: 10px 0 0 690px;color: #2edc29; font-size:16px; background-color: white; width: 160px;">
                User successfully edited</p>
        <?php endif; ?>
        <?php if(isset($_GET['error']) && $_GET['error'] == 'unable_d'): ?>
            <p style="scale: 120%; margin: 10px 0 0 690px;color: #ff9999; font-size:16px; background-color: white; width: 150px;">
                Unable to delete user</p>
        <?php endif; ?>
        <?php if(isset($_GET['message']) && $_GET['message'] == 'tick_d'): ?>
            <p style="scale: 120%; margin: 10px 0 0 680px;color: #2edc29; font-size:16px; background-color: white; width: 170px;">
                User successfully deleted</p>
        <?php endif; ?>
        <table>
            <tr>
                <th>Account Name</th>
                <th>E-Mail</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        <?php

        $query = null;
        $result = null;

        if($_SESSION['UID'] == 1) {
            $query = "SELECT * FROM `users`;";
            $result = mysqli_query($conn, $query);
        }
        else if(isset($_SESSION['UID']))
        {
            $id = $_SESSION['UID'];
            $query = "SELECT * FROM `users` where UID = '$id'";
            $result = mysqli_query($conn, $query);
        }
        else
        {
            header("Location: loginpage.php?error=pls_log_in");
        }


        while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['UserName'] ?> </td>
                <td><?= $row['UserEmail'] ?></td>
                <td>*******</td>
                <td>
                    <a href="edit.php?id=<?= $row['UID'] ?>">Edit</a> /
                    <a href="delete.php?id=<?= $row['UID'] ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile;
        $conn->close();
        ?>
        </table>
    </div>
</body>
</html>


