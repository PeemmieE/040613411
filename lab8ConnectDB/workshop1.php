
<html>
<head><meta charset="utf-8"></head>
<body>
<?php
$pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
    <table border="1">
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>รายละเอียด</th>
            <th>ราคา<th>
        </tr>
        <?php
$stmt = $pdo->prepare("SELECT * FROM product");
$stmt->execute(); 
        
            while ($row = $stmt->fetch()){
                echo "<tr>"."<td>".$row ["pid"]."</td>";
                echo "<td>". $row ["pname"] . "</td>";
                echo "<td>".$row ["pdetail"]."</td>";
                echo "<td>". $row ["price"] ." บาท" ."</td>";
                echo "</tr>";
            }
        ?>
        
    </table>
</body>
</html>