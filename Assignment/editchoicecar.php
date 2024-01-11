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
    <?php

    $modelid = $_GET['id'];
    $query = "SELECT * FROM `model` where modelID = $modelid;";
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();

    ?>
    <div style="background-color: #5c5c5c; border: 6px solid #e5e0e0; border-radius: 15px; margin: 90px 0 0 550px; width: 500px; height: 650px; text-align: center;">
      <form action="carfinaledit.php" method="post">
          <h1 style="color: white;">Model:</h1>
          <input type="text" style="margin: 20px 0 0 100px;" name="modelin" value="<?php echo $row['modelName']?>">
          <h1 style="color: white;">Description:</h1>
          <textarea style="scale: 150%; margin: 10px 0 0 0; resize: none;" rows="8" cols="30" name="descin"><?php echo $row['description']?></textarea>
          <br>
          <h1 style="color: white; margin-top:40px;">Image Source:</h1>
          <textarea style="scale: 150%; margin: 10px 0 0 -4px; resize: none;" rows="5" cols="30" name="imgin"><?php echo $row['img_src']?></textarea>
          <input type="submit" value="submit" style="margin: 50px 0 0 100px">
          <input type="hidden" name="modelID" value="<?php echo $row['modelID']?>">
      </form>
    </div>