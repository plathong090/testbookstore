<?php
$bookId = $_REQUEST['bookId'];
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "testphp";
$conn = mysqli_connect($hostname, $username, $password);
if (!$conn)
    die("ไม่สามารถติดต่อกับ mySQL ได้");
mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล testphp ได้");

$sql = "delete from book where bookId='$bookId'";
if (mysqli_query($conn, $sql)) {
    echo "ลบข้อมูลสำเร็จ";
} else {
    echo "ข้อผิดพลาด: " . mysqli_error($conn);
}

mysqli_close($conn);
header("location:bookList1.php");?>