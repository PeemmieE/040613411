<?php include "connect.php"; 

$stmt=$pdo->prepare("SELECT * From member Where username=?");
$stmt->bindParam(1,$_GET["username"]);
$stmt->execute(); 
$row = $stmt->fetch();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="edit.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="username" value="<?=$row["username"]?>"><br>
        แก้ไขชื่อ:<input type="text" name="name"><br>
        แก้ไขเบอร์:<input type="text" name="phone"><br>
        แก้ไขอีเมลล์:<input type="text" name="email"><br>
        <input type="file" name="picc" accept="image/png, image/gif, image/jpeg , image/jpg" ><br><br>
        <input type="submit" value="Update" name="update">
    </form>
</body>
</html>