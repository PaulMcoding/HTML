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
$id = $_GET["id"];

$query = "SELECT * FROM model join make using(makeID) WHERE modelID = $id;";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();
?>

<div id="edform" style="height: 300px;">
    <p style="text-align: center; color: white; scale: 150%; margin: 30px 0 10px 0;">Delete Car:</p>
    <form action="cardeleter.php" method="post">
        <?php echo "<br><br><p style='color: white; text-align: center; scale: 150%;'>
        Are you sure you want to delete: <br>". $row["makeName"] . " ". $row["modelName"] . "</p>";?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input style="margin: 30px 0 0 100px;" type="submit" value="Submit">
    </form>
</div>

</body>

