<?php
session_start();
session_unregister("UserName");
$UserName = $_GET['UserName'];
echo "User : " . $UserName . " now logout.";
echo "<br><a href='login.php'>คลิก กลับไปหน้ํา login </a>"
    ?>