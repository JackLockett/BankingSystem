<?php

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');

$stmt = "DELETE FROM Customer WHERE Status = 'Withdrawn'";
$sql = $db->prepare($stmt);
//$sql->bindParam(':ApplicationID', $_POST['ApplicationID'], SQLITE3_TEXT);

$sql->execute();

header("Location: /Admin/AdminViewCustomer.php?deletedwithdrawn=true");

