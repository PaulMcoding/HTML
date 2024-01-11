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

$id = $_POST["id"];

$query = "DELETE FROM `model` WHERE modelID = $id";

if (mysqli_query($conn, $query)) {
    if($_SESSION['UID'] != 1) {
        $_SESSION['del'] = 1;
        header("Location: Logout.php");
    }
    else
    {
        header("Location: main_page.php?ticker=del");
    }
} else {
    header("Location: getAccount.php?error=unable_d");
}
?>