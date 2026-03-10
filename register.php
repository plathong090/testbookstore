<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['Name'];
    $surname = $_POST['Surname'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $confirm_password = $_POST['ConfirmPassword'];

    if ($password != $confirm_password) {
        echo "<!DOCTYPE html><html><head></head><body><div class='container center error'>Password not match.<br><a href='register.php'>Back</a></div></body></html>";
        exit();
    }

    $hostname = "localhost";
    $username_db = "root";
    $password_db = "root";
    $dbname = "testphp";

    $conn = mysqli_connect($hostname, $username_db, $password_db);
    if (!$conn) die("ติดต่อกับ MySQL ไม่ได้");
    mysqli_select_db($conn, $dbname) or die("ไม่สามารถเลือกฐานข้อมูล test ได้");

    $sqltxt = "SELECT * FROM login WHERE Username = '$username'";
    $result = mysqli_query($conn, $sqltxt);
    if (mysqli_num_rows($result) > 0) {
        echo "<!DOCTYPE html><html><head><link rel='stylesheet' href='style.css'></head><body><div class='container center error'>Username already exists.<br><a href='register.php'>Back</a></div></body></html>";
        exit();
    }

    $sqltxt = "SELECT MAX(UserId) as maxid FROM user";
    $result = mysqli_query($conn, $sqltxt);
    $rs = mysqli_fetch_array($result);
    $userId = ($rs['maxid'] ?? 0) + 1;
    $sqltxt = "INSERT INTO user (UserId, Name, Surname) VALUES ($userId, '$name', '$surname')";
    mysqli_query($conn, $sqltxt);

    $status = 'active';
    $sqltxt = "INSERT INTO login (Username, Password, Status, UserId) VALUES ('$username', '$password', '$status', $userId)";
    mysqli_query($conn, $sqltxt);

    echo "<!DOCTYPE html><html><head><link rel='stylesheet' href='style.css'></head><body><div class='container center success'>Registration successful.<br><a href='login.php'>Login</a></div></body></html>";
} else {
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>สมัครสมาชิก</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <a href="login.php">เข้าสู่ระบบ</a>
        <a href="register.php">สมัครสมาชิก</a>
    </nav>
    <div class="container">
        <form action="register.php" method="post">
            <table align="center" border='1' width='300'>
                <tr>
                    <td colspan='2' align='center'>สมัครสมาชิก</td>
                </tr>
                <tr>
                    <td>ชื่อ</td>
                    <td><input type="text" name="Name" required></td>
                </tr>
                <tr>
                    <td>นามสกุล</td>
                    <td><input type="text" name="Surname" required></td>
                </tr>
                <tr>
                    <td>ชื่อผู้ใช้</td>
                    <td><input type="text" name="Username" required></td>
                </tr>
                <tr>
                    <td>รหัสผ่าน</td>
                    <td><input type="password" name="Password" required></td>
                </tr>
                <tr>
                    <td>ยืนยันรหัสผ่าน</td>
                    <td><input type="password" name="ConfirmPassword" required></td>
                </tr>
                <tr>
                    <td colspan='2' align='center'><input type="submit" value="Register"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
<?php
}
?>