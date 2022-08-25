<?php
include("../NavBar.php");
require_once("AdminLoginCheck.php");

$usernameError = $passwordError = $loginError = "";

if (isset($_POST['submit'])) {

    $array_user = verifyAdmins(); 

    if ($_POST["username"]=="") {
        $usernameError = "Username is required";
      } 
      
      if ($_POST["password"]==null) {
        $passwordError = "Password is required";
      }

    if($_POST['username'] != null && $_POST["password"] !=null)
    {
      
      if ($array_user != null) {

        session_start();

        $helper = array_keys($_SESSION);
        foreach ($helper as $key){
            unset($_SESSION[$key]);
        }

        session_start();
        $_SESSION['admin'] = $array_user[0]['adminUsername'];
        
        header("Location: AdminIndexPage.php"); 
        exit();   
     }
     if ($array_user !== null)
     {
         $loginError = "Invalid admin credentials";
     }
    }
}

?>

<div class="container pb-5">
        <main role="main" class="pb-3">
            <h1>Admin Login Page</h1><br>

            <div class="row">
            <div class="col-6">

                <form method="post">

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Username</label>
                        <input class="form-control" type="text" name = "username">
                        <span class="text-danger"><?php echo $usernameError; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Password</label>
                        <input class="form-control" type="password" name = "password">
                        <span class="text-danger"><?php echo $passwordError; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <b><span class="text-danger"><?php echo $loginError; ?></span></b>
                   </div>

                   <br>

                   <div class="form-group col-md-4">
                        <input class="btn btn-primary" type="submit" value="Login" name="submit">
                   </div>

                </form>
            </div>
   	  </main>
</div>

<?php require("../Footer.php");?>
