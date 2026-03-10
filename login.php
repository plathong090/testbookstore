<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <a href="login.php">เข้าสู่ระบบ</a>
        <a href="register.php">สมัครสมาชิก</a>
    </nav>
    <div class="container">
        <form action="checkuser.php" method="post">
            <table align="center" border='1' width='300'>
                <tr>
                    <td colspan='2'>
                        <center>กรุณาเข้าสู่ระบบ</center>
                    </td>
                </tr>
                <tr>
                    <td>ชื่อผู้ใช้</td>
                    <td><input type="text" name="UserName"></td>
                    </td>
                <tr>
                    <td>รหัสผ่าน</td>
                    <td><input type="password" name="Password"></td>
                    </td>
                <tr align="center"></tr>
                <td colspan='2'><input type="submit" value=" OK "></td>

                </tr>
            </table>
        </form>
    </div>
</body>

</html>