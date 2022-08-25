<?php

function checkSession ($path) {

    $expireAfter = 5; 

    if(isset($_SESSION['last_action'])){
        
        $secondsInactive = time() - $_SESSION['last_action'];
        
        $expireAfterSeconds = $expireAfter * 10;

        if($secondsInactive >= $expireAfterSeconds){
            session_unset();
            session_destroy();
            header("Location:".$path);
        }
    }
    $_SESSION['last_action'] = time(); 
    $url=$_SERVER['REQUEST_URI'];
    $timeOut = ($expireAfter*10)+1;  
    header("Refresh: $timeOut; URL=$url"); 
}
?>