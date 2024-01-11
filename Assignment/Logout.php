<?php
    session_start();
    //unset($_SESSION['UID']);
    session_destroy();

    if($_SESSION['del'] == 1) {
        header("location: main_page.php?error=del");
        $_SESSION['del'] = null;
    }
    else
        header("location: main_page.php");
?>