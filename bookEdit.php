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

/* =========================
   รับค่า BookID จากหน้า list
========================= */
$bookId = isset($_GET['bookId']) ? $_GET['bookId'] : '';

if ($bookId == '') {
    die("ไม่พบรหัสหนังสือ");
}

/* =========================
   ดึงข้อมูลหนังสือ
========================= */
$sql = "SELECT * FROM book WHERE BookID='$bookId'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("เกิดข้อผิดพลาด: " . mysqli_error($conn));
}

$book = mysqli_fetch_assoc($result);

if (!$book) {
    die("ไม่พบข้อมูลหนังสือ");
}

/* =========================
   dropdown ประเภทหนังสือ
========================= */
function getTypeSelect($selected = '')
{
    global $conn;
    $sql = "SELECT * FROM typebook ORDER BY TypeID";
    $result = mysqli_query($conn, $sql);

    echo '<option value="">เลือกประเภทหนังสือ</option>';

    while ($row = mysqli_fetch_assoc($result)) {
        $sel = ($row['TypeID'] == $selected) ? 'selected' : '';
        echo '<option value="' . htmlspecialchars($row['TypeID']) . '" ' . $sel . '>'
            . htmlspecialchars($row['TypeName']) .
            '</option>';
    }
}

/* =========================
   dropdown สถานะหนังสือ
========================= */
function getStatusSelect($selected = '')
{
    global $conn;
    $sql = "SELECT * FROM statusbook ORDER BY statusID";
    $result = mysqli_query($conn, $sql);

    echo '<option value="">เลือกสถานะ</option>';

    while ($row = mysqli_fetch_assoc($result)) {
        $sel = ($row['statusID'] == $selected) ? 'selected' : '';
        echo '<option value="' . htmlspecialchars($row['statusID']) . '" ' . $sel . '>'
            . htmlspecialchars($row['statusName']) .
            '</option>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลหนังสือ</title>
</head>

<body>
    <center>

        <form method="post" action="bookUpdate.php" enctype="multipart/form-data">

            <br><br>

            <table width="700" border="1" bgcolor="#ffffff">
                <tr>
                    <th colspan="2">แก้ไขข้อมูลหนังสือ</th>
                </tr>

                <tr>
                    <td width="200">รหัสหนังสือ :</td>
                    <td>
                        <input type="text" name="BookID" value="<?php echo htmlspecialchars($book['BookID']); ?>"
                            readonly>
                    </td>
                </tr>

                <tr>
                    <td>ชื่อหนังสือ :</td>
                    <td>
                        <input type="text" name="BookName" value="<?php echo htmlspecialchars($book['BookName']); ?>"
                            required>
                    </td>
                </tr>

                <tr>
                    <td>ประเภทหนังสือ :</td>
                    <td>
                        <select name="TypeID" required>
                            <?php getTypeSelect($book['TypeID']); ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>สถานะหนังสือ :</td>
                    <td>
                        <select name="statusID" required>
                            <?php getStatusSelect($book['StatusID']); ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>สำนักพิมพ์ :</td>
                    <td>
                        <input type="text" name="Publish" value="<?php echo htmlspecialchars($book['Publish']); ?>">
                    </td>
                </tr>

                <tr>
                    <td>ราคาที่ซื้อ :</td>
                    <td>
                        <input type="number" name="UnitPrice"
                            value="<?php echo htmlspecialchars($book['UnitPrice']); ?>" step="0.01">
                    </td>
                </tr>

                <tr>
                    <td>ราคาที่เช่า :</td>
                    <td>
                        <input type="number" name="UnitRent" value="<?php echo htmlspecialchars($book['UnitRent']); ?>"
                            step="0.01">
                    </td>
                </tr>

                <tr>
                    <td>จำนวนวันที่เช่า :</td>
                    <td>
                        <input type="number" name="DayAmount"
                            value="<?php echo htmlspecialchars($book['DayAmount']); ?>">
                    </td>
                </tr>

                <tr>
                    <td>รูปภาพ :</td>
                    <td>
                        <?php
                        $picture = $book['picture'] ?? '';
                        ?>

                        <?php if (!empty($picture)) { ?>
                        <img src="picture/<?php echo htmlspecialchars($picture); ?>" width="120"><br>
                        <?php } ?>

                        <input type="file" name="imageFile">
                        <input type="hidden" name="oldImageFile" value="<?php echo htmlspecialchars($picture); ?>">
                    </td>
                </tr>

            </table>

            <br>
            <input type="submit" value="บันทึกการแก้ไข">
            <input type="reset" value="ยกเลิก">

        </form>

        <br><br>
        <a href="bookList1.php">กลับหน้า bookList1.php</a>

    </center>
</body>

</html>

<?php mysqli_close($conn); ?>