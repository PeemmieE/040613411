<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
            function conDelete(username,namee){
                let ans = confirm("ต้องการลบ"+namee)
                if(ans){
                    document.location = "delete.php?username="+username
                }
            }
            function edit(username,namee){
                
                    document.location = "workshop9.php?username="+username
                
            }
    </script>
</head>
<body>
    <form>
        <input type="text" name="user">
        <input type="submit" value="Delete">
    </form>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();

    // if(!empty($_GET["user"])){
    //     $stmt = $pdo->prepare("DELETE FROM member WHERE username=?");
    //     $stmt->bindParam(1, $_GET["user"]);
    //     if ($stmt->execute()){ 
    //         header("location: workshop5.php"); 
    //     }
    // }
?>
    <?php while($row = $stmt->fetch()):?>
            ชื่อสมาชิก : <?=$row ["name"]?><br>
            ที่อยู่ : <?=$row ["address"]?><br>
            อีเมลล์ : <?=$row ["email"]?><br>
            <img  src="member_photo/<?=$row["username"]?>.jpg" width='100'>
            <br>
            <a href="#" onclick="conDelete('<?= $row["username"] ?>','<?= $row["name"] ?>')">ลบ</a>
            
            <a href="#" onclick="edit('<?= $row["username"] ?>','<?= $row["name"] ?>')"> แก้ไข</a>
            <hr>
<?php endwhile;?>

</body>
</html>