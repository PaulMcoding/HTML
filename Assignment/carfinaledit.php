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


$name = $_POST['modelin'];
$desc = $_POST['descin'];
$img = $_POST['imgin'];
$modelID = $_POST['modelID'];

$query = "UPDATE model SET modelName='$name', description='$desc', img_src='$img' WHERE modelID = $modelID;";

if (mysqli_query($conn, $query)) {
    header("Location: main_page.php?ticker=car_edited");
} else {
    header("Location: main_page.php?error=unable");
}
?>