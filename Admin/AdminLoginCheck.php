<?php

function verifyAdmins () {

if (!isset($_POST['username']) or !isset($_POST['password'])) {
    return;  
}

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
$stmt = $db->prepare('SELECT adminUsername FROM AdminUser WHERE adminUsername=:username AND adminPassword=:password');
$stmt->bindParam(':username', $_POST['username'], SQLITE3_TEXT);
$stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);

$result = $stmt->execute();

$rows_array = [];
while ($row=$result->fetchArray())
{
    $rows_array[]=$row;
}
return $rows_array;
}
