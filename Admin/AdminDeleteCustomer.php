<?php include("../NavBarAdmin.php");
include_once("AdminDeleteCustomerSQL.php") ?>

<div class="container pb-5">
    <main role="main" class="pb-3">

    <h2>Delete Customer: <?php echo $_GET['ApplicationID'];?></h2><br>
        <h4 style="color: red;">Are you sure want to delete this user?</h4><br>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">First Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Last Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Date Of Birth</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Postcode</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][4] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Contact Number</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][5] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Product</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][6] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Status</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][7] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <form method="post">
                     <input type="hidden" name="ApplicationID" value = "<?php echo $_GET['ApplicationID'] ?>"><br>
                    <input type="submit" value="Delete" class="btn btn-danger" name="delete"><a href="/Admin/AdminViewCustomer.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
            </div>
        </div>

   </main>
</div>

<?php require("../Footer.php");?>