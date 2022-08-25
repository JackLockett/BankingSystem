<?php 
include("../NavBar.php");
require_once("CustomerLoginCheck.php");

$errorid = $errorpostcode = $errorlname = $loginError = "";

if (isset($_POST['submit'])){

    $array_user = verifyCustomers(); 

    if ($_POST['applicationid']==""){
        $errorid = "Application ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['postcode']==null){
        $errorpostcode = "Postcode is mandatory";
        $allFields = "no";
    }
    if ($_POST['lname']==""){
        $errorlname = "Last Name is mandatory";
        $allFields = "no";
    }

    if($_POST['applicationid'] != null && $_POST["postcode"] !=null && $_POST["lname"] !=null)
    {
      if ($array_user != null) {
    
        session_start();

        $helper = array_keys($_SESSION);
        foreach ($helper as $key){
            unset($_SESSION[$key]);
        }
        
        session_start();
        $_SESSION['customer'] = $array_user[0]['ApplicationID'];
        
        header("Location: CustomerIndexPage.php?"); 
        exit();   
     }
     if ($array_user !== null)
     {
         $loginError = "Invalid customer credentials";
     }
    }
}
?>

<div class="container pb-5">
        <main role="main" class="pb-3">
        <h1>Customer Login Page</h1><br>

        <div class="row">
            <div class="col-6">
                <form method="post">

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Application ID</label>
                        <input class="form-control" type="text" name = "applicationid">
                        <span class="text-danger"><?php echo $errorid; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Postcode</label>
                        <input class="form-control" type="text" name = "postcode">
                        <span class="text-danger"><?php echo $errorpostcode; ?></span>
                   </div>

                   <div class="form-group col-md-5">
                        <label class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name = "lname">
                        <span class="text-danger"><?php echo $errorlname; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <b><span class="text-danger"><?php echo $loginError; ?></span></b>
                   </div>

                   <br>

                   <div class="form-group col-md-8"><a href="CustomerRegister.php">Not registered yet? Join the campaign now!</a></div>

                   <br>

                   <div class="form-group col-md-4">
                        <input class="btn btn-primary" type="submit" value="Login" name ="submit">
                   </div>
                </form>
            </div>
        </div>
   	  </main>
</div>

<?php require("../Footer.php");?>
