<?php
session_start();
$username = $_GET['username'];
$password = $_GET['password'];
$_SESSION['username']=$username;
$_SESSION['password']=$password;
?>
ชื่อผู้ใช้ที่คุณป้อนมาให้คือ
<?php
echo "username : " .  $_SESSION['username'];
echo " password : " . $_SESSION['password'];
?>
<br><br><a href="session_file3.php">คลิกตรงนี้เพื่อไปยังไฟล์ session_file3.php</a>