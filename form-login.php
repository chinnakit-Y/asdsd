<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="process-login.php" method="POST">
        <div>
            <input name="email_account" type="email" placeholder="อีเมล" required>
        </div>
        <div>
            <input name="password_account" type="password" placeholder="รหัสผ่าน" required>
        </div>
        <button type="submit">เข้าสู่ระบบ</button>
        <a href="form-register.php">สร้างบัญชีใหม่</a>
    </form>
</body>
</html>