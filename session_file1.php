<?php
session_start();
session_destroy();
?>
<h3>กรุณาป้อนชื่อผู้ใช้งานและรหัสผ่าน</h3>
<form action="session_file2.php">
     <div class="form-group">
            <label>Username :</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Password :</label>
            <input type="password" name="password" required>
        </div>

        <input type="submit" value="OK">
</form>