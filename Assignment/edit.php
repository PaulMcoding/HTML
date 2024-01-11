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
<div id="edform" style="height: 430px;">
    <p style="text-align: center; color: white; scale: 150%; margin-bottom: 30px;">Edit <?= $row['UserName']?>:</p>
    <form method="post">

        <p class="forom" style="margin-bottom:-20px;">Username</p>

<?php echo "<input name='new_name' pattern='[A-Za-z0-9]+' title='Spaces not allowed' style='margin: 30px 0 0 100px;' type='text' 
            required style='font-size: 20px; margin-top: 200px; color: dodgerblue;'placeholder="
            . $row["UserName"] . " value=". $row["UserName"] .">";?>

        <p class="forom" style="margin-bottom:-20px;">Email</p>

<?php echo "<input name='new_mail' style='margin: 30px 0 0 100px;' type='email' style='font-size: 20px; margin-top: 200px; color: dodgerblue;' placeholder="
            . $row["UserEmail"] . " value=". $row["UserEmail"] ." required>";?>

        <p class="forom" style="margin-bottom:-20px;">Password</p>
        <?php echo "<input name='Password' style='margin: 30px 0 0 100px;' type='password' style='font-size: 20px; margin-top: 200px; color: dodgerblue;' value=". $row["Password"] ." required>";?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input style="margin: 30px 0 0 100px;" type="submit" value="Submit">
    </form>
</div>


<?php
    $id = $_POST["id"];
    $new_name = $_POST["new_name"];
    $new_mail = $_POST["new_mail"];
    $pass = $_POST["Password"];

    $query = "UPDATE users SET UserName='$new_name', UserEmail='$new_mail', Password='$pass' WHERE UID=$id";

    if (mysqli_query($conn, $query)) {
        header("Location: getAccount.php?message=tick");
    } else {
        header("Location: getAccount.php?error=unable");
    }
?>
</body>