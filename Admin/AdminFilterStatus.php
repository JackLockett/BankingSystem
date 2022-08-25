<?php
$db = new SQLITE3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
$sql = "SELECT * FROM Customer WHERE Status = :sortstatus";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
header('Location: AdminViewCustomer.php');
?>


