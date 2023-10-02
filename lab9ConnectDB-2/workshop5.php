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
<form>
<input type="text" name="search" >
<input type="submit" value="SEARCH">
</form>

<?php
$stmt = $pdo->prepare("SELECT * FROM member WHERE member.name LIKE ?");
if(!empty($_GET["search"])){
    $value = '%' . $_GET["search"] . '%';

$stmt->bindParam(1, $value); // ก าหนดชอตัวแปรเงื่อนไขที่จุดที่ก าหนด ื่ ? ไว ้


$stmt->execute(); ?>




<?php while($row = $stmt->fetch()):?>
    <a href="detail.php?username=<?=$row["username"]?>">
            ชื่อสมาชิก : <?=$row ["name"]?><br>
             <!-- ที่อยู่ : <?=$row ["address"]?><br>
            อีเมลล์ : <?=$row ["email"]?><br> -->
            <img  src="member_photo/<?=$row["username"]?>.jpg" width='100'>
            <hr>
    </a>
<?php endwhile;
}else{
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();

    while($row = $stmt->fetch()):?>
        <a href="detail.php?username=<?=$row["username"]?>">
                ชื่อสมาชิก : <?=$row ["name"]?><br>
                 <!-- ที่อยู่ : <?=$row ["address"]?><br>
                อีเมลล์ : <?=$row ["email"]?><br> -->
                <img  src="member_photo/<?=$row["username"]?>.jpg" width='100'>
                <hr>
        </a>
    <?php endwhile;
}

?>


</body>
</html>