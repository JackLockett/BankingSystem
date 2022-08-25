<?php

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');

$stmt = "DELETE FROM AuditLog WHERE AuditID = :AuditID";
$sql = $db->prepare($stmt);
$sql->bindParam(':AuditID', $_GET['id'], SQLITE3_TEXT);

$sql->execute();

header("Location: /Admin/AdminAuditLog.php?deletedaudit=true");

