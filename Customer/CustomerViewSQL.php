<?php

function getCustomer (){
    $db = new SQLITE3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
    $sql = "SELECT * FROM Customer";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    $arrayResult = [];
    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row;
    }
    return $arrayResult;
}?>


