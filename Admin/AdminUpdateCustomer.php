<?php include("../NavBarAdmin.php");
include_once("AdminUpdateCustomerSQL.php")
?>

<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>Update Customer</h2><br>
        <div class="row">
            <div class="col-6">
                <form method="post">

                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Application ID</label>
                        <input class="form-control" type="text" name = "appid" value="<?php echo $arrayResult[0][0]; ?>" disabled>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">First Name</label>
                        <input class="form-control" type="text" name = "fname" value="<?php echo $arrayResult[0][1]; ?>">
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name = "lname" value="<?php echo $arrayResult[0][2]; ?>">
                   </div>

                   <div class="form-group col-md-5">
                        <label class="control-label labelFont">Date Of Birth</label>
                        <select class="form-control labelFont" name="datebirth">
                        <option value="<?php echo substr($arrayResult[0][3], 0, 2); ?>"><?php echo substr($arrayResult[0][3], 0, 2); ?></option>
                        <?php for($number=1;$number<=31;$number++) : ?>
                            <option value="<?php echo $number; ?>"><?php echo $number ?></option>
                        <?php endfor; ?>
                        </select>
                   </div>

                   <div class="form-group col-md-5">
                        <label class="control-label labelFont">Month Of Birth</label>
                        <select class="form-control labelFont" name="monthbirth">
                            <option value="<?php echo trim($arrayResult[0][3], " 0..9"); ?>"><?php echo trim($arrayResult[0][3], " 0..9"); ?></option>
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
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Postcode</label>
                        <input class="form-control" type="text" name = "postcode" value="<?php echo $arrayResult[0][4]; ?>">
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Contact Number</label>
                        <input class="form-control" type="text" name = "contactnumber" value="<?php echo $arrayResult[0][5]; ?>">
                   </div>

                   <div class="form-group col-md-4">
                        <label class="control-label labelFont">Products</label>
                        <select class="form-control" name="product">
                            <<option value="<?php echo $arrayResult[0][6]?>"><?php echo $arrayResult[0][6]; ?></option>
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

                   <div class="form-group col-md-4">
                        <label class="control-label labelFont">Status</label>
                        <select class="form-control" name="status">
                            <<option value="<?php echo $arrayResult[0][7]?>"><?php echo $arrayResult[0][7]; ?></option>
                            <option value="New">New</option>
                            <option value="In-process">In-process</option>
                            <option value="Complete">Complete</option>
                            <option value="On-hold">On-hold</option>
                            <option value="Withdrawn">Withdrawn</option>
                        </select>
                   </div>

                   <br>
                   <div class="form-group col-md-3">
                       <input type="submit" name="submit" value="Update" class="btn btn-primary">
                   </div>
                   <div class="form-group col-md-3"><a href="AdminViewCustomer.php">Go Back</a></div>
                </form>
            </div>
        </div>
    </main>
</div>

<?php require("../Footer.php");?>