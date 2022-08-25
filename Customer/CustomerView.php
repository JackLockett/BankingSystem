<?php include("../NavBarCustomer.php");
include_once("CustomerViewSQL.php");?>

<?php $user = getCustomer();?>

<div class="container pb-5">
    <main role="main" class="pb-3">
        
        <h1>Your Details</h1><br>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>Application ID</td>
                        <td>Product</td>
                        <td>Status</td>
                        <td>Actions</td>
                    </thead>

                    <?php
                        for ($i=0; $i<count($user); $i++):
                    ?>
                    <tr>
                        <td><?php echo $user[$i]['ApplicationID']?></td>
                        <td><?php echo $user[$i]['Product']?></td>                    
                        <td><?php echo $user[$i]['Status']?></td>
                        <td><a href="AdminUpdateCustomer.php?ApplicationID=<?php echo $user[$i]['ApplicationID']; ?>">Update</a>&nbsp 
                    </tr>
                    <?php endfor;?>
                </table>  
            </div>
        </div>

   </main>
</div>

<?php require("../Footer.php");?>
