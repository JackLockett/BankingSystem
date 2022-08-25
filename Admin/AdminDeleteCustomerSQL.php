<?php

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
$sql = "SELECT ApplicationID, FirstName, LastName, DateOfBirth, Postcode, Contact, Product, Status FROM Customer WHERE ApplicationID=:ApplicationID";
$stmt = $db->prepare($sql);
$stmt->bindParam(':ApplicationID', $_GET['ApplicationID'], SQLITE3_TEXT);
$result= $stmt->execute();
$arrayResult = [];

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

if (isset($_POST['delete'])){

    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');

    $stmt = "DELETE FROM Customer WHERE ApplicationID = :ApplicationID";
    $sql = $db->prepare($stmt);
    $sql->bindParam(':ApplicationID', $_POST['ApplicationID'], SQLITE3_TEXT);

    $sql->execute();

    //Audit Log

    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
    $sql = 'INSERT INTO AuditLog(Log, AuditID) VALUES (:newLog, :logID)';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':newLog', $adminAudit, SQLITE3_TEXT); 
    $stmt->bindParam(':logID', $randomLog, SQLITE3_TEXT); 

    $adminAudit = "Customer Deleted - ".$_POST['ApplicationID'];

    $digits = 10;
    $idrandomnumber = rand(pow(10, $digits-1), pow(10, $digits)-1);
    $randomLog = $idrandomnumber;

    $stmt->execute();

    header("Location: /Admin/AdminViewCustomer.php?deleted=true");
}

