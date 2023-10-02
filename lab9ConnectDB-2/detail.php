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

<?php
$stmt = $pdo->prepare("SELECT * FROM member where username=?");    
$stmt->bindParam(1, $_GET["username"]);
$stmt->execute(); 
$row = $stmt->fetch();
?>

ชื่อสมาชิก : <?=$row ["name"]?><br>
              ที่อยู่ : <?=$row ["address"]?><br>
            อีเมลล์ : <?=$row ["email"]?><br> 
            <img  src="member_photo/<?=$row["username"]?>.jpg" width='100'>
            <hr>
</body>
</html>