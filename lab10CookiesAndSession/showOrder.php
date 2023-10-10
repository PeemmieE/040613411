<?php session_start(); ?>
<?php include 'connect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $stmt=$pdo->prepare("SELECT orders.ord_date,product.pname,item.quantity,(item.quantity*product.price),orders.status FroM orders join item on orders.ord_id=item.ord_id 
    join product on item.pid = product.pid where orders.username=?");
    $stmt->bindParam(1,$_GET["username"]);
    $stmt->execute();
    echo "<h1>" . "Order of " .  $_GET["username"] . "</h1>";
    while ($row=$stmt->fetch()): ?>
        ในวันที่ <?=$row["ord_date"]?><br>
        ชื่อสินค้า: <?=$row["pname"]?><br>
        จำนวน: <?=$row["quantity"]?><br>
        ราคารวม: <?=$row["(item.quantity*product.price)"]?> บาท<br>
        สถานะ: <?=$row["status"]?><br>
        <hr>
    <?php endwhile;

?>







</body>
</html>