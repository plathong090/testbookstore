<?php
session_start();
$UserName = $_SESSION['UserName'];
session_destroy();
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>ออกจากระบบ</title>
</head>

<body>
    <nav>
        <a href="login.php">เข้าสู่ระบบ</a>
        <a href="register.php">สมัครสมาชิก</a>
    </nav>
    <div class="container center">
        User : <?php echo $UserName; ?> now logout.
        <br><a href='login.php'>คลิก กลับไปหน้ํา login </a>
    </div>
</body>

</html>