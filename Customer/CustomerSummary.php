<?php include("../NavBar.php"); 
 include("../Session.php");

$result = $_GET['createUser']; 

session_start();
$applicationid = $_SESSION["ApplicationID"];
$product = $_SESSION["Product"];

$entry = "";
if ($product == "100") {
    $entry .= "10";
}
if ($product == "300") {
    $entry .= "15";
}
if ($product == "500") {
    $entry .= "25";
}
if ($product == "800") {
    $entry .= "35";
}
if ($product == "1000") {
    $entry .= "45";
}
if ($product == "5000") {
    $entry .= "55";
}
if ($product == "10000") {
    $entry .= "60";
}
if ($product == "15000") {
    $entry .= "65";
} 

?>

<div class="container pb-5">
        <main role="main" class="pb-3">
        <h1>Summary Page</h1><br>

        <div class="row">

            <div class="pb-3">
                <h2>Successfully Registered</h2><br>
            </div>

            <br>

            <div class="alert alert-success col-12" role="alert" style="font-weight: bold;">
            Thank you for your interest to open a Time Deposit Account with us under this
            campaign. <br><br>
            
            Your application ID is <b><?php echo $applicationid ?></b>. Only one application is
            allowed per customer. <br><br>

            You will have <b><?php echo $entry ?> entries</b> for the lucky draw (stand a chance to win £10,000) upon
            successful deposit placement until the end of account tenure. <br><br>

            Your record has been successfully submitted. You may update your record as
            long as your application status is “new” by providing the application ID from
            this <a href="CustomerLogin.php">Link</a></div>

            <br><br>
            <a href="CustomerRegister.php">Go Back</a></div>
            </div>
        </div>
</div>

<?php
    include("../Footer.php"); 
?>
