<?php
session_start();
$UserName = $_POST['UserName'];
$Password = $_POST['Password'];

$hostname = "localhost";
$username = "root";
$password = "root";
$dbname = "testphp";

$conn = mysqli_connect($hostname, $username, $password);

if (!$conn)
    die("ติดต่อกับ MySQL ไม่ได ้");
mysqli_select_db($conn, $dbname) or die("ไม่สํามํารถเลือกฐํานข ้อมูล test ได ้");

$sqltxt = "SELECT * FROM login where Username = '$UserName'";
$result = mysqli_query($conn, $sqltxt);

$rs = mysqli_fetch_array($result);
if ($rs)
{
    if ($rs['Password'] == $Password) {
        $_SESSION['UserName'] = $UserName;
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