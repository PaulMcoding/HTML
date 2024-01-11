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
$model = $_POST["modelIn"];
$img = $_POST["imgIn"];
$description = $_POST["descriptionIn"];

$query = "select modelName from model where modelName = '$model';";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
    header("Location: addcarinfo.php?error=car_exist");
    exit;
}
else
{
    $query = "insert into model(makeID, modelName, description, img_src) values('$id', '$model', '$description', '$img')";
    if (mysqli_query($conn, $query)) {
        header("Location: main_page.php?ticker=car_added");
    }
    else {
        header("Location: addcar.php");
    }
}


