<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "testphp";

$conn = mysqli_connect($hostname, $username, $password, $dbName);
if (!$conn) {
    die("ไม่สามารถติดต่อกับ MySQL ได้: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");

/* รับค่า BookID */
$bookId = $_GET['bookId'] ?? '';

if ($bookId == '') {
    die("ไม่พบรหัสหนังสือ");
}

$sql = "SELECT b.*, t.TypeName, s.statusName
        FROM book b
        LEFT JOIN typebook t ON b.TypeID = t.TypeID
        LEFT JOIN statusbook s ON b.StatusID = s.statusID
        WHERE b.BookID='$bookId'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("เกิดข้อผิดพลาด: " . mysqli_error($conn));
}

$book = mysqli_fetch_assoc($result);

if (!$book) {
    die("ไม่พบข้อมูลหนังสือ");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>รายละเอียดหนังสือ</title>
</head>

<body>
    <center>
        <br>
        <h3>รายละเอียดหนังสือ</h3><br>

        <table width="600" border="1" cellpadding="8">

            <tr>
                <td width="200"><b>รหัสหนังสือ</b></td>
                <td><?php echo htmlspecialchars($book['BookID']); ?></td>
            </tr>

            <tr>
                <td><b>ชื่อหนังสือ</b></td>
                <td><?php echo htmlspecialchars($book['BookName']); ?></td>
            </tr>

            <tr>
                <td><b>ประเภทหนังสือ</b></td>
                <td><?php echo htmlspecialchars($book['TypeID']); ?></td>
            </tr>

            <tr>
                <td><b>สถานะหนังสือ</b></td>
                <td><?php echo htmlspecialchars($book['StatusID']); ?></td>
            </tr>

            <tr>
                <td><b>สำนักพิมพ์</b></td>
                <td><?php echo htmlspecialchars($book['Publish']); ?></td>
            </tr>

            <tr>
                <td><b>ราคาที่ซื้อ</b></td>
                <td><?php echo htmlspecialchars($book['UnitPrice']); ?></td>
            </tr>

            <tr>
                <td><b>ราคาที่เช่า</b></td>
                <td><?php echo htmlspecialchars($book['UnitRent']); ?></td>
            </tr>

            <tr>
                <td><b>จำนวนวันที่เช่า</b></td>
                <td><?php echo htmlspecialchars($book['DayAmount']); ?></td>
            </tr>

            <tr>
                <td><b>รูปภาพ</b></td>
                <td>
                    <?php if (!empty($book['picture'])) { ?>
                    <img src="picture/<?php echo htmlspecialchars($book['picture']); ?>" width="150">
                    <?php } else { ?>
                    ไม่มีรูปภาพ
                    <?php } ?>
                </td>
            </tr>

            <tr>
                <td><b>วันที่จัดเก็บหนังสือ</b></td>
                <td><?php echo htmlspecialchars($book['BookDate']); ?></td>
            </tr>

        </table>

        <br><br>
        <a href="bookList1.php">กลับหน้า bookList1.php</a>

    </center>
</body>

</html>

<?php mysqli_close($conn); ?>