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
            echo "<a href='loginpage.php' style='float:right'>Login</a>";
        }
        ?>
        <a href="whoarewe.php">Who are we</a>
        <a href="memberactions.php">Member actions</a>
        <a href="main_page.php" style="float:right;">Home</a>
    </div>
</header>

<?php
$id = $_GET["id"];

$query = "SELECT * FROM `users` WHERE UID = $id;";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();
?>

<div id="edform" style="height: 300px">
    <p style="text-align: center; color: white; scale: 150%; margin: 30px 0 0 30px;">Delete User:</p>
    <form method="post">

        <?php echo "<br><br><p style='color: white; text-align: center; scale: 150%;'>Are you sure you want to delete user: <br>" . $row["UserName"] . "</p>";?>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input style="margin: 30px 0 0 100px;" type="submit" value="Submit">
    </form>
</div>

<?php
    $id = $_POST["id"];

    $query = "DELETE FROM `users` WHERE `users`.`UID` = $id";

    if (mysqli_query($conn, $query)) {
        if($_SESSION['UID'] != 1) {
            $_SESSION['del'] = 1;
            header("Location: Logout.php");
        }
        else
        {
            header("Location: main_page.php?error=del");
        }
    } else {
    header("Location: getAccount.php?error=unable_d");
    }
    ?>
</body>

