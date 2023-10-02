<?php include "connect.php";  ?>

<?php
$stmt = $pdo->prepare("UPDATE member SET member.name=?, mobile=?, member.email=? WHERE username=?"); 

if(isset($_FILES["picc"])){
    $filename = $_FILES["picc"]["name"];
    $filetemp = $_FILES["picc"]["tmp_name"];
    $folder = "member_photo/" . $filename;
    if(file_exists($folder)){
        unlink($folder);
    }
    move_uploaded_file($filetemp, $folder);
}


$stmt->bindParam(1, $_POST["name"]); 
$stmt->bindParam(2, $_POST["phone"]);
$stmt->bindParam(3, $_POST["email"]);
$stmt->bindParam(4, $_POST["username"]);
   $stmt->execute();
   header("location: detail.php?username=" . $_POST["username"]);
    

?>