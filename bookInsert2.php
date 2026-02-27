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

$bookId     = $_POST['bookId'];
$bookName   = $_POST['bookName'];
$typeId     = $_POST['TypeID'];
$statusId   = $_POST['statusID'];
$publish    = $_POST['Publish'];
$unitPrice  = $_POST['UnitPrice'];
$unitRent   = $_POST['UnitRent'];
$dayAmount  = $_POST['DayAmount'];
$picture    = $_FILES['imageFile'] ?? null;
$bookDate = date("Y-m-d");

$imageName = "";

if (!empty($_FILES['imageFile']['name'])) {
    $imageName = time() . "_" . $_FILES['imageFile']['name'];
    move_uploaded_file($_FILES['imageFile']['tmp_name'], "picture/" . $imageName);
}

$sql = "INSERT INTO book 
        (BookID, BookName, TypeID, StatusID, Publish, UnitPrice, UnitRent, DayAmount, picture , bookDate)
        VALUES
        ('$bookId','$bookName','$typeId','$statusId',
         '$publish','$unitPrice','$unitRent','$dayAmount','$imageName','$bookDate')";

if (mysqli_query($conn, $sql)) {
    header("location:bookList1.php");
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    echo "<br>SQL: " . htmlspecialchars($sql);
}

mysqli_close($conn);