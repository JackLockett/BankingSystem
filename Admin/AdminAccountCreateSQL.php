<?php

function isUsernameTaken() {
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
    $admin = $_POST['username'];
    $rows = $db->query("SELECT COUNT(*) as count FROM AdminUser WHERE adminUsername = '$admin'");
    $row = $rows->fetchArray();
    $numRows = $row['count'];

    return $numRows;
}

function registerAdmin(){

    $created = false;
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
    $sql = 'INSERT INTO AdminUser(adminUsername, adminPassword) VALUES (:adminUsername, :adminPassword)';
    $stmt = $db->prepare($sql); 

    $stmt->bindParam(':adminUsername', $_POST['username'], SQLITE3_TEXT); 
    $stmt->bindParam(':adminPassword', $_POST['password'], SQLITE3_TEXT); 

    $stmt->execute();   

    //Audit Log

    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
    $sql = 'INSERT INTO AuditLog(Log, AuditID) VALUES (:newLog, :logID)';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':newLog', $adminAudit, SQLITE3_TEXT); 
    $stmt->bindParam(':logID', $randomLog, SQLITE3_TEXT); 

    $adminAudit = "New Admin User - ".$_POST['username'];

    $digits = 10;
    $idrandomnumber = rand(pow(10, $digits-1), pow(10, $digits)-1);
    $randomLog = $idrandomnumber;

    $stmt->execute();   
    
    if($stmt){
        $created = true;
    }

    return $created;  
}

