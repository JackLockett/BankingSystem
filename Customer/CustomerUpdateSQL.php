<?php

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
$sql = "SELECT * FROM Customer WHERE ApplicationID=:appid";
$stmt = $db->prepare($sql);
$stmt->bindParam(':appid', $_GET['ApplicationID'], SQLITE3_TEXT);
$result= $stmt->execute();
$arrayResult = [];

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

$ApplicationID = $arrayResult[0][0];

if (isset($_POST['submit'])){

    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
    $sql = "UPDATE Customer SET Product = :product, Status = :withdraw WHERE ApplicationID = '$ApplicationID'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':product',$_POST['product'], SQLITE3_TEXT);
    $stmt->bindParam(':withdraw',$_POST['withdraw'], SQLITE3_TEXT);

    $stmt->execute();

    //Audit Log

    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
    $sql = 'INSERT INTO AuditLog(Log, AuditID) VALUES (:newLog, :logID)';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':newLog', $adminAudit, SQLITE3_TEXT); 
    $stmt->bindParam(':logID', $randomLog, SQLITE3_TEXT); 

    $productAudit = $_POST['product'];
    $withdrawn = $_POST['withdraw'];

    $adminAudit = "$ApplicationID - Updated Status | Product = $productAudit | Status = $withdrawn";

    $digits = 10;
    $idrandomnumber = rand(pow(10, $digits-1), pow(10, $digits)-1);
    $randomLog = $idrandomnumber;

    $stmt->execute();

    header('Location: /Customer/CustomerIndexPage.php?updated=true');


}


 
