<?php
$hostname = "localhost";
$username = "root";
$password = "root";
$dbName = "testphp";

$conn = mysqli_connect($hostname, $username, $password, $dbName);

if (!$conn) {
    die("ไม่สามารถติดต่อกับ MySQL ได้: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");


function getTypeSelect()
{
    global $conn;
    $sql = "SELECT * FROM typebook ORDER BY TypeID";
    $dbQuery = mysqli_query($conn, $sql);

    if (!$dbQuery) {
        die("(functionDB:getTypeSelect) select typebook มีข้อผิดพลาด: " . mysqli_error($conn));
    }

    echo '<option value="">เลือกประเภทหนังสือ</option>';

    while ($result = mysqli_fetch_assoc($dbQuery)) {
        $typeId = $result['TypeID'] ?? $result['TypeId'] ?? '';
        echo '<option value="' . htmlspecialchars($typeId) . '">'
            . htmlspecialchars($result['TypeName']) .
            '</option>';
    }
}


function getStatusSelect()
{
    global $conn;
    $sql = "SELECT * FROM statusbook ORDER BY statusID";
    $dbQuery = mysqli_query($conn, $sql);

    if (!$dbQuery) {
        die("(functionDB:getStatusSelect) select statusbook มีข้อผิดพลาด: " . mysqli_error($conn));
    }

    echo '<option value="">เลือกสถานะ</option>';

    while ($result = mysqli_fetch_object($dbQuery)) {
        echo '<option value="' . htmlspecialchars($result->statusID) . '">'
            . htmlspecialchars($result->statusName) .
            '</option>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลหนังสือ</title>
</head>

<body>
    <center>

        <form enctype="multipart/form-data" name="save" method="post" action="bookInsert2.php">

            <br><br>

            <table width="700" border="1" bgcolor="#ffffff">
                <tr>
                    <th colspan="2" height="21">เพิ่มข้อมูลหนังสือ</th>
                </tr>

                <tr>
                    <td width="200">รหัสหนังสือ :</td>
                    <td width="400">
                        <input type="text" name="bookId" size="10" maxlength="5" required>
                    </td>
                </tr>

                <tr>
                    <td>ชื่อหนังสือ :</td>
                    <td>
                        <input type="text" name="bookName" size="50" maxlength="50" required>
                    </td>
                </tr>

                <tr>
                    <td>ประเภทหนังสือ :</td>
                    <td>
                        <select name="TypeID" required>
                            <?php getTypeSelect(); ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>สถานะหนังสือ :</td>
                    <td>
                        <select name="statusID" required>
                            <?php getStatusSelect(); ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>สำนักพิมพ์ :</td>
                    <td>
                        <input type="text" name="Publish" maxlength="25" size="20">
                    </td>
                </tr>

                <tr>
                    <td>ราคาที่ซื้อ :</td>
                    <td>
                        <input type="number" name="UnitPrice" step="0.01" min="0">
                    </td>
                </tr>

                <tr>
                    <td>ราคาที่เช่า :</td>
                    <td>
                        <input type="number" name="UnitRent" step="0.01" min="0">
                    </td>
                </tr>

                <tr>
                    <td>จำนวนวันที่เช่า :</td>
                    <td>
                        <input type="number" name="DayAmount" min="1">
                    </td>
                </tr>

                <tr>
                    <td>รูปภาพ :</td>
                    <td>
                        <input type="file" name="imageFile" accept=".jpg,.jpeg,.gif">
                        <br>
                        <font size="2" color="#ff3300">
                            นามสกุล .gif หรือ .jpg เท่านั้น
                        </font>
                    </td>
                </tr>

            </table>

            <br>
            <input type="submit" name="submit" value="บันทึกข้อมูล" style="cursor:pointer;">
            <input type="reset" name="reset" value="ยกเลิก" style="cursor:pointer;">

        </form>

        <br><br>
        <a href="bookList1.php">กลับหน้ารายการหนังสือ</a>

    </center>
</body>

</html>