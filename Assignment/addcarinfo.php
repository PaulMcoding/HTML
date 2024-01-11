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
        <a href="memberactions.php" style="background-color: #383838;">Member Actions</a>
        <a href="main_page.php" style="float:right;">Home</a>
    </div>
</header>

<?php
    $make = $_POST["makeIn"];
    echo $make;

    $query = "SELECT * FROM `make` WHERE makeName = '$make';";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $makeid = $row['makeID'];
        echo $makeid;
    }
    else
    {
        $query = "INSERT INTO make(makeName) VALUES('$make')";
        mysqli_query($conn, $query);
        $makeid = mysqli_insert_id($conn);
        echo $makeid;
    }
?>

<section>
    <div id="test" style="height: 300px;">
        <p id="newcar">Add your Car details</p>
    </div>
</section>

<section>
    <?php if(isset($_GET['error']) && $_GET['error'] == 'car_exist'): ?>
        <p style="margin-top: -35px; color: #ff9999; font-size:18px; text-align: center;">Car already exists in System</p>
    <?php endif; ?>
    <div id="enterbox" style="margin-top: 60px;">
        <form action="insertcardetails.php" method="post">
            <input type="text" name="modelIn" placeholder="Enter the model"><br>
            <input type="text" name="imgIn" placeholder="Enter image source"><br>
            <input type="text" name="descriptionIn" placeholder="Enter description"><br>
            <input type="hidden" name="id" value='<?php echo $makeid; ?>'>
            <input class="findcar" style="margin-left: 40px;" type="submit" value="Add a Car">
        </form>
    </div>
</section>
</body>
</html>