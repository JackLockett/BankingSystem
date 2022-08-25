<?php 
 include("../NavBarAdmin.php");
 include("../Session.php");
 
 $path = "AdminLogin.php"; 
     
 session_start(); 
 if (!isset($_SESSION['admin'])){
     session_unset();
     session_destroy();
     header("Location:".$path);
 }
 $user = $_SESSION['admin']; 
 checkSession ($path); 

 ?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h1>Welcome to <span style = "color: #BA0046">Admin Area</h1>

        <br>

        <h2 style="text-align: center;">You are logged into: <span style = "color: #BA0046"><?php echo "$user" ?></h2>

        <br><br>
        <h2 style="font-size: 23px;"><a href="./AdminViewCustomer.php">View Customers</h2>
        <br><br>
        <h2 style="font-size: 23px;"><a href="./AdminAccountCreate.php">Create Admin Account</h2>
        <br><br>
        <h2 style="font-size: 23px;"><a href="./AdminAuditLog.php">View Bank Audit Logs</a></h2>
        <br><br>
        <h2 style="font-size: 23px;"><a href="./AdminLogout.php">Log Out</a></h2>
    </main>
</div>

