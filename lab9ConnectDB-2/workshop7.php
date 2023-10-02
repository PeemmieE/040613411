<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="workshop8.php" method="post" enctype="multipart/form-data">
        กรอก username:<input type="text" name="username"><br>
        กรอกpassword:<input type="text" name="password"><br>
        กรอกชื่อ:<input type="text" name="name"><br>
        กรอกที่อยู่:<input type="text" name="address"><br>
        กรอกเบอร์:<input type="text" name="phone"><br>
        กรอกEmail:<input type="text" name="email"><br>
        <input type="file" name="picc" accept="image/png, image/gif, image/jpeg , image/jpg" ><br><br>
        <input type="submit" value="Insert" name="insert">
    </form>
</body>
</html>