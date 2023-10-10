<?php
try {
	$pdo = new PDO("mysql:host=localhost;dbname=blueshop;charset=utf8", "testuser", "0927174056");
} catch (PDOException $e) {
	echo "เกิดข้อผิดพลาด : ".$e->getMessage();
}
?>