<?php
session_start();
$UserName = $_POST['UserName'];
$Password = $_POST['Password'];

$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "testphp";
$conn =mysqli_connect($hostname, $username, $password);

if (!$conn)
    die("ไม่สํามํารถติดต่อกับ MySQL ได ้");
mysqli_select_db($dbname, $conn) or die("ไม่สํามํารถเลือกฐํานข ้อมูล test ได ้");
$sqltxt = "SELECT * FROM login where UserName = '$UserName'";
$result = mysqli_query($sqltxt, $conn);
$rs = mysqli_fetch_array($result);
if ($rs) // พบ Username
{
    if ($rs['Password'] == $Password) {
        session_register("UserName");
        header("Location: welcome.php?UserName=$UserName");
    } else {
        echo "<br>Password not match.";
        echo "<br><a href='login.php'>คลิก กลับไปเพื่อ login </a>";
    }
} else {
    echo "Not found UserName " . $UserName;
    echo "<br><a href='login.php'>คลิก กลับไปเพื่อ login </a>";
}
?>