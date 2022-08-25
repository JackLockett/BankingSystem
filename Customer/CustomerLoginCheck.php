<?php

function verifyCustomers () {

if (!isset($_POST['applicationid']) or !isset($_POST['postcode']) or !isset($_POST['lname'])) {
    return;  
}

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
$stmt = $db->prepare('SELECT ApplicationID FROM Customer WHERE ApplicationID=:applicationid AND Postcode=:postcode AND LastName = :lname');
$stmt->bindParam(':applicationid', $_POST['applicationid'], SQLITE3_TEXT);
$stmt->bindParam(':postcode', $_POST['postcode'], SQLITE3_TEXT);
$stmt->bindParam(':lname', $_POST['lname'], SQLITE3_TEXT);

$result = $stmt->execute();

$rows_array = [];
while ($row=$result->fetchArray())
{
    $rows_array[]=$row;
}
return $rows_array;
}
