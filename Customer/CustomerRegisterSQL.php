<?php

function registerCustomer(){

    $created = false;
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db'); 
    $sql = 'INSERT INTO Customer(ApplicationID, FirstName, LastName, DateOfBirth, Postcode, Contact, Product, Status) VALUES (:ApplicationID, :FirstName, :LastName, :DateOfBirth, :Postcode, :Contact, :Product, :Status)';
    $stmt = $db->prepare($sql); 

    $stmt->bindParam(':ApplicationID', $applicationid, SQLITE3_TEXT); 
    $stmt->bindParam(':FirstName', $_POST['fname'], SQLITE3_TEXT); 
    $stmt->bindParam(':LastName', $_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':DateOfBirth', $datemonth, SQLITE3_TEXT);   
    $stmt->bindParam(':Postcode', $_POST['postcode'], SQLITE3_TEXT);
    $stmt->bindParam(':Contact', $_POST['contactnumber'], SQLITE3_TEXT);
    $stmt->bindParam(':Product', $_POST['product'], SQLITE3_TEXT);
    $stmt->bindParam(':Status', $status, SQLITE3_TEXT);

    $idlastname = substr($_POST['lname'], 0, 2);
    $idfirstname = substr($_POST['fname'], 0, 2);
    $idpostcode = substr($_POST['postcode'], -2);
    $iddate = date("d");

    $digits = 5;
    $idrandomnumber = rand(pow(10, $digits-1), pow(10, $digits)-1);

    $applicationid = $idlastname.$idfirstname.$idpostcode.$iddate.$idrandomnumber;

    $date = $_POST['datebirth'];
    $month = $_POST['monthbirth'];
    $datemonth = $date." ".$month;

    $status = 'New';

    session_start();
    $_SESSION["ApplicationID"] = $applicationid;
    $_SESSION["Product"] = $_POST['product'];

    $stmt->execute();

    //Audit Log

    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
    $sql = 'INSERT INTO AuditLog(Log, AuditID) VALUES (:newLog, :logID)';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':newLog', $adminAudit, SQLITE3_TEXT); 
    $stmt->bindParam(':logID', $randomLog, SQLITE3_TEXT); 

    $adminAudit = "New Customer - ".$applicationid;

    $digits = 10;
    $idrandomnumber = rand(pow(10, $digits-1), pow(10, $digits)-1);
    $randomLog = $idrandomnumber;

    $stmt->execute();

    if($stmt){
        $created = true;
    }

    return $created;
    

}

