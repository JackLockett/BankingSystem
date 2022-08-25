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
    $sql = "UPDATE Customer SET FirstName = :fname, LastName = :lname, DateOfBirth = :datebirth, Postcode = :postcode, Contact = :contactnumber, Product = :product, Status = :status WHERE ApplicationID = '$ApplicationID'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':fname',$_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lname',$_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':datebirth',$datemonth, SQLITE3_TEXT);
    $stmt->bindParam(':postcode',$_POST['postcode'], SQLITE3_TEXT);
    $stmt->bindParam(':contactnumber',$_POST['contactnumber'], SQLITE3_TEXT);
    $stmt->bindParam(':product',$_POST['product'], SQLITE3_TEXT);
    $stmt->bindParam(':status',$_POST['status'], SQLITE3_TEXT);

    $date = $_POST['datebirth'];
    $month = $_POST['monthbirth'];
    $datemonth = $date." ".$month;

    $stmt->execute();

    //Audit Log

    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
    $sql = 'INSERT INTO AuditLog(Log, AuditID) VALUES (:newLog, :logID)';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':newLog', $adminAudit, SQLITE3_TEXT); 
    $stmt->bindParam(':logID', $randomLog, SQLITE3_TEXT); 

    $adminAudit = "Admin Updated Customer - $ApplicationID";

    $digits = 10;
    $idrandomnumber = rand(pow(10, $digits-1), pow(10, $digits)-1);
    $randomLog = $idrandomnumber;

    $stmt->execute();

    header('Location: /Admin/AdminViewCustomer.php?updated=true');

}
