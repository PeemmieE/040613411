<?php include "connect.php"; ?>

<?php

if(isset($_POST["insert"])){
    
    // $upload_image = new upload($_FILES['pic']) ;
    if(isset($_FILES["pic"])){
        $filename = $_FILES["picc"]["name"];
        $tempname = $_FILES["picc"]["tmp_name"];
        $folder = "member_photo/" . $filename;
        if (file_exists($folder)) {
            unlink($folder); // ลบไฟล์เดิม
        }
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
    }
    

    $stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ? , ?, ?)");
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["phone"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->execute(); 
    $pid = $pdo->lastInsertId(); 
    header("location: detail.php?username=" . $_POST["username"]);
}



// header คือฟังก์ชนที่จัดการส ั งข้อมูลไปยังไฟล์ที่ก าหนด ่ (send redirect)
// ในที่นีคือ ให้เปิดเว็บหน้า ้ product-detail.php พร้อมกับสงรหัสส ่ นค้า ิ (pid) แนบไปกับ URL
// header("location: workshop5.php ");
?>