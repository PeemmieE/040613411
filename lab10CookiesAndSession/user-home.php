<?php session_start(); ?>
<?php include 'connect.php';?>
<html>
<body>
<h1>สวัสดี <?=$_SESSION["fullname"]?></h1>
ดูหน้าสินค้าโปรดคลิก <a href='product-list.php'>หน้าสินค้า</a>
หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>


<?php
    if($_SESSION["role"]=="user"){
        $stmt=$pdo->prepare("SELECT orders.ord_date,product.pname,item.quantity,(item.quantity*product.price),orders.status FroM orders join item on orders.ord_id=item.ord_id 
    join product on item.pid = product.pid where orders.username=?");
    $stmt->bindParam(1,$_SESSION["username"]);
    $stmt->execute();
    echo "<h1>" . "Order of " . $_SESSION["username"] . "</h1>";
    while ($row=$stmt->fetch()): ?>
        ในวันที่ <?=$row["ord_date"]?><br>
        ชื่อสินค้า: <?=$row["pname"]?><br>
        จำนวน: <?=$row["quantity"]?><br>
        ราคารวม: <?=$row["(item.quantity*product.price)"]?> บาท<br>
        สถานะ: <?=$row["status"]?><br>
        <hr>
    <?php endwhile;

    }else if($_SESSION["role"]=="admin"){
    $stmt=$pdo->prepare("SELECT member.name, orders.ord_date,product.pname,item.quantity,(item.quantity*product.price),orders.status FroM orders join item on orders.ord_id=item.ord_id 
    join product on item.pid = product.pid JOIN member on member.username = orders.username");
    // $stmt->bindParam(1,$_SESSION["username"]);
    $stmt->execute(); 
    $ord=$pdo->prepare("SELECT member.username From member where member.role = 'user'");
    $ord->execute();
    echo "<h1>" . "ดู Order รายคน" . "</h1>";
    while ($roww=$ord->fetch()):?>
    <a href="showOrder.php?username=<?=$roww["username"]?>"><?=$roww["username"]?></a><br>
    <?php   endwhile;
    echo "<h1>" . "Order ทั้งหมด" . "</h1>";
    while ($row=$stmt->fetch()): ?>
    <hr>
        ชื่อผู้ใช้ที่ซื้อ: <?=$row["name"]?><br>
        ในวันที่ <?=$row["ord_date"]?><br>
        ชื่อสินค้า: <?=$row["pname"]?><br>
        จำนวน: <?=$row["quantity"]?><br>
        ราคารวม: <?=$row["(item.quantity*product.price)"]?> บาท<br>
        สถานะ: <?=$row["status"]?><br>
        
    <?php endwhile;




    }?>
    

</body>
</html>
