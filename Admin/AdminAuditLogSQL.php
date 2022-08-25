<?php

function getAudit (){
    $db = new SQLITE3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
    $sql = "SELECT * FROM AuditLog";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    $arrayResult = [];
    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}?>


