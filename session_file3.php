<?php
session_start();
echo "username : " . $_SESSION['username'];
echo " password : " . $_SESSION['password'];
?>
<br><br><a href="session_file1.php">คลิกตรงนี้เพื่อไปยังไฟล์ session_file1.php</a>