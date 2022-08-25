<?php include("../NavBarCustomer.php");
include_once("CustomerUpdateSQL.php")
?>

<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>Update Your Details</h2><br>
        <div class="row">
            <div class="col-6">
                <form method="post">

                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Application ID</label>
                        <input class="form-control" type="text" name = "appid" value="<?php echo $arrayResult[0][0]; ?>" disabled>
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
                    
                   <?php if ($arrayResult[0][7] != "Withdrawn"): ?>

                    <div class="form-group col-md-5">
                        <label class="control-label labelFont">Withdraw my application?</label>
                        <input type="radio" name="withdraw"
                        <?php if (isset($withdraw) && $withdraw=="yes") echo "checked";?>
                        value="Withdrawn"> Yes
                        <br>
                        <input type="radio" name="withdraw"
                        <?php if (isset($withdraw) && $withdraw=="no") echo "checked";?>
                        checked="checked" value="<?php echo $arrayResult[0][7]?>"> No
                        </select><br>
                        <div class="form-group col-md-3">
                       <input type="submit" name="submit" value="Update" class="btn btn-primary">
                   </div>

                   <?php endif; ?>

                   <div class="form-group col-md-3"><a href="CustomerIndexPage.php">Go Back</a></div>
                </form>
            </div>
        </div>
    </main>
</div>

<?php require("../Footer.php");?>