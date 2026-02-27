<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "testphp";

$conn = mysqli_connect($hostname, $username, $password, $dbName);
if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลไม่ได้: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");

$bookId     = $_POST['BookID'];
$bookName   = $_POST['BookName'];
$typeId     = $_POST['TypeID'];
$statusId   = $_POST['statusID'];
$publish    = $_POST['Publish'];
$unitPrice  = $_POST['UnitPrice'];
$unitRent   = $_POST['UnitRent'];
$dayAmount  = $_POST['DayAmount'];
$oldImage   = $_POST['oldImageFile'];
$imageName = $oldImage;

if (!empty($_FILES['imageFile']['name'])) {
    $imageName = time() . "_" . $_FILES['imageFile']['name'];
    move_uploaded_file($_FILES['imageFile']['tmp_name'], "picture/" . $imageName);
}

$sql = "UPDATE book SET
        BookName='$bookName',
        TypeID='$typeId',
        StatusID='$statusId',
        Publish='$publish',
        UnitPrice='$unitPrice',
        UnitRent='$unitRent',
        DayAmount='$dayAmount',
        picture='$imageName'
        WHERE BookID='$bookId'";

if (mysqli_query($conn, $sql)) {
    header("location:bookList1.php");
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

mysqli_close($conn);