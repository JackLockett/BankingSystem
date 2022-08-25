<?php 
include("../NavBarAdmin.php");
include_once("AdminAccountCreateSQL.php");

$errorUsername = $errorPassword = $errorCreate = "";
$allFields = "yes";

if (isset($_POST['submit'])){

    if ($_POST['username']==""){
        $errorUsername = "Username is mandatory";
        $allFields = "no";
    }
    if ($_POST['password']==null){
        $errorPassword = "Password is mandatory";
        $allFields = "no";
    }

    if($allFields == "yes")
    {
        $taken = isUsernameTaken();
        if ($taken != 1) {
            $createUser = registerAdmin();
            header('Location: AdminAccountSummary.php?createUser='.$createUser); 
        }
        else {
            $errorCreate = "Username is taken";
        }
  
    }
}

?>

<div class="container pb-5">
        <main role="main" class="pb-3">
        <h1>Create Admin Account</h1><br>

        <div class="row">
            <div class="col-6">
                <form method="post">

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Username</label>
                        <input class="form-control" type="text" name = "username">
                        <span class="text-danger"><?php echo $errorUsername; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Password</label>
                        <input class="form-control" type="text" name = "password">
                        <span class="text-danger"><?php echo $errorPassword; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <b><span class="text-danger"><?php echo $errorCreate; ?></span></b>
                   </div>

                   <br>

                   <div class="form-group col-md-4">
                        <input class="btn btn-primary" type="submit" value="Register" name ="submit">
                   </div>
                </form>
            </div>
        </div>
   	  </main>
</div>

<?php require("../Footer.php");?>
