<?php
    session_set_cookie_params(0);
    session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment";

$conn = new mysqli($servername, $username, $password, $dbname);
//$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>

<html lang="en">
<head>
    <title>CarsAndBuys.com: Your chosen car</title>
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
            <a href="main_page.php" style="float:right;">Home</a>
        </div>
    </header>

    <div class="car-container">
        <?php
        $choice = $_GET["model"];
        $query = "SELECT makeName, modelName, description, img_src FROM model join make using(makeid) where modelName =
            '$choice'";

        $result = $conn->query($query);
        if ($result->num_rows > 0)
        {
        $row = $result->fetch_assoc();

        echo "<p style='margin-top: 0px; color: white;'>" . $row["makeName"] . " " . $row["modelName"] . "</p>";

        echo "<a href='" . $row["img_src"] . "'>";
        echo "<img src='" . $row["img_src"] . "'>";
        echo "</a>";
        ?>

        <div id="textbox">
            <?php echo "<p style='font-size: 20px; margin-top: 0px; color: white;'>" . $row["description"] . "</p>";
            $conn->close();
            }
            else {
                header("Location: main_page.php?error=invalid_password");
                exit;
                $conn->close();
            }
            ?>
        </div>
    </div>
</body>