<?php 
include("../NavBar.php");
include_once("CustomerRegisterSQL.php");

$errorfname = $errorlname = $errordatebirth = $errormonthbirth = $errorpostcode = $errorcontact = "";
$allFields = "yes";

if (isset($_POST['submit'])){

    if ($_POST['fname']==""){
        $errorfname = "First name is mandatory";
        $allFields = "no";
    }
    if ($_POST['lname']==null){
        $errorlname = "Last name is mandatory";
        $allFields = "no";
    }
    if ($_POST['datebirth']==""){
        $errordatebirth = "Date of birth is mandatory";
        $allFields = "no";
    }
    if ($_POST['monthbirth']==""){
        $errormonthbirth = "Month is mandatory";
        $allFields = "no";
    }
    if ($_POST['postcode']==""){
        $errorpostcode = "Postcode is mandatory";
        $allFields = "no";
    }
    if ($_POST['contactnumber']==""){
        $errorcontact = "Contact Number is mandatory";
        $allFields = "no";
    }

    if($allFields == "yes")
    {
        $createUser = registerCustomer();
        header('Location: CustomerSummary.php?createUser='.$createUser);
    }
}
?>

<div class="container pb-5">
        <main role="main" class="pb-3">
        <h1>Register for Product Interest</h1><br>

        <div class="row">
            <div class="col-6">
                <form method="post">

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">First Name</label>
                        <input class="form-control" type="text" name = "fname">
                        <span class="text-danger"><?php echo $errorfname; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name = "lname">
                        <span class="text-danger"><?php echo $errorlname; ?></span>
                   </div>

                   <div class="form-group col-md-5">
                        <label class="control-label labelFont">Date Of Birth</label>
                        <select class="form-control labelFont" name="datebirth">
                        <option value="">Select Date</option>
                        <?php for($number=1;$number<=31;$number++) : ?>
                            <option value="<?php echo $number; ?>"><?php echo $number ?></option>
                        <?php endfor; ?>
                        </select>
                        <span class="text-danger"><?php echo $errordatebirth; ?></span>
                   </div>

                   <div class="form-group col-md-5">
                        <label class="control-label labelFont">Month Of Birth</label>
                        <select class="form-control labelFont" name="monthbirth">
                            <option value="">Select Date</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        <span class="text-danger"><?php echo $errormonthbirth; ?></span>
                   </div>

                   <div class="form-group col-md-5">
                        <label class="control-label labelFont">Postcode</label>
                        <input class="form-control" type="text" name = "postcode">
                        <span class="text-danger"><?php echo $errorpostcode; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Contact Number</label>
                        <input class="form-control" type="text" name = "contactnumber">
                        <span class="text-danger"><?php echo $errorcontact; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Products</label>
                        <select class="form-control" name="product">
                            <option value="100">£100 - 6 Months</option>
                            <option value="300">£300 - 5 Months</option>
                            <option value="500">£500 - 3 Months</option>
                            <option value="800">£800 - 3 Months</option>
                            <option value="1000">£1000 - 3 Months</option>
                            <option value="5000">£5000 - 3 Months</option>
                            <option value="10000">£10000 - 5 Months</option>
                            <option value="15000">£15000 - 5 Months</option>
                        </select>
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
