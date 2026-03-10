<?php
session_start();
if (!isset($_SESSION['UserName'])) {
    echo "<!DOCTYPE html><html lang='th'><head><meta charset='UTF-8'><title>เข้าสู่ระบบ</title><link rel='stylesheet' href='style.css'></head><body><nav><a href='login.php'>เข้าสู่ระบบ</a><a href='register.php'>สมัครสมาชิก</a></nav><div class='container center'>You not login.<br><a href='login.php'>Login</a></div></body></html>";
} else {
    $UserName = $_SESSION['UserName'];
    $hostname = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "testphp";
    $conn = mysqli_connect($hostname, $username, $password);
    if (!$conn)
        die("ไม่สามารถติดต่อกับ MySQL ได ้");
    mysqli_select_db($conn, $dbname) or die("ไม่สามารถเลือกฐานข้อมูลได ้");
    
    $sqltxt = "SELECT l.Username FROM login l WHERE l.Username = '$UserName'";
    $result = mysqli_query($conn, $sqltxt);
    if (mysqli_num_rows($result) == 0) {
        session_destroy();
        header("Location: login.php");
        exit();
    }

    $sqltxt = "SELECT l.Username, l.Password, l.Status, u.Name, u.Surname FROM login l JOIN user u ON l.UserId = u.UserId WHERE l.Username = '$UserName'";
    $result = mysqli_query($conn, $sqltxt);
    $rs = mysqli_fetch_array($result);
    echo "<!DOCTYPE html><html lang='th'><head><meta charset='UTF-8'><title>ข้อมูลส่วนตัว</title><link rel='stylesheet' href='style.css'></head><body><nav><a href='introduce.php'>ข้อมูลส่วนตัว</a><a href='bookList1.php'>รายชื่อหนังสือ</a><a href='logout.php'>ออกจากระบบ</a></nav><div class='container'>";
    echo "<table border=1 align=center bgcolor=white width=100>";
    echo "<tr><td align=center colspan=2 bgcolor =#FF99CC>";
    echo "<B>แสดงรายละเอียดผู้ใช้</B></td></tr>";
    echo "<tr><td>ชื่อ </td><td>" . $rs["Name"] . "</td></tr>";
    echo "<tr><td>นามสกุล </td><td>" . $rs["Surname"] . "</td></tr>";
    echo "<tr><td>ชื่อผู้ใช้  </td><td>" . $rs["Username"] . "</td></tr>";
    echo "<tr><td>รหัสผ่าน </td><td>" . $rs["Password"] . "</td></tr>";
    echo "<tr><td> สถานะการใช้งาน </td><td>" . $rs["Status"] . "</td></tr>";
    echo "</table>";
    echo "</div></body></html>";
}?>