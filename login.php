<?php
?>
<form action="checkuser.php" method="post">
    <table align="center" border='1' width='300'>
        <tr>
            <td colspan='2' align='center'>กรุณาป้อนชื่อผู้ใช้งานและรหัสผ่าน </td>
        </tr>
        <tr>
            <td>Username :</td>
            <td><input type="text" name="UserName"></td>
            </td>
        <tr>
            <td>Password :</td>
            <td><input type="password" name="Password"></td>
            </td>
        <tr>
            <td colspan='2' align='center'><input type="submit" value=" OK "></td>
        </tr>
    </table>
</form>
หน้าสแดงรายละเอียดผู้ใช้หลีงล็อกอิน ถ้า username ถูกแสดงโปรไฟล์นศ
เพิ่มหน้าแสดงข้อมูลส่วนตัวนศ
ต้องมีการตรวจสอบได้ทำการล็อกอินมั้ยด้วย session 