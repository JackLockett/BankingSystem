<?php include("../NavBarAdmin.php");

function sortedUsers (){
    $db = new SQLITE3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
    $newStatus = $_GET['newStatus'];
    if ($newStatus == "All") {
        $sql = "SELECT * FROM Customer";
    }
    else {
        $sql = "SELECT * FROM Customer WHERE Status = '$newStatus'";
    }
    
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    $arrayResult = [];
    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row;
    }
    return $arrayResult;
}

$user = sortedUsers();?>


<div class="container pb-5">
    <main role="main" class="pb-3">

        <form>
        Customer Status:
        <select name="newStatus">
            <option value="All">All</option>
            <option value="New">New</option>
            <option value="In-process">In-process</option>
            <option value="Complete">Complete</option>
            <option value="On-hold">On-hold</option>
            <option value="Withdrawn">Withdrawn</option>
        </select>
        <input class="btn btn-primary" type="submit" value="Filter" name ="submit"> 
        </form>
        
        <h1>View Customers</h1><br>

        <div class="row">
            <div class="col-12">
                
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>Application ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Date Of Birth</td>
                        <td>Postcode</td>
                        <td>Contact Number</td>
                        <td>Product</td>
                        <td>Status</td>
                        <td>Actions</td>
                    </thead>

                    <?php
                        for ($i=0; $i<count($user); $i++):
                    ?>
                    <tr>
                        <td><?php echo $user[$i]['ApplicationID']?></td>
                        <td><?php echo $user[$i]['FirstName']?></td>
                        <td><?php echo $user[$i]['LastName']?></td>
                        <td><?php echo $user[$i]['DateOfBirth']?></td>
                        <td><?php echo $user[$i]['Postcode']?></td>
                        <td><?php echo $user[$i]['Contact']?></td>   
                        <td><?php echo $user[$i]['Product']?></td>                    
                        <td><?php echo $user[$i]['Status']?></td>
                        <td><a href="AdminUpdateCustomer.php?ApplicationID=<?php echo $user[$i]['ApplicationID']; ?>">Update</a>&nbsp 
                        <a href="AdminDeleteCustomer.php?ApplicationID=<?php echo $user[$i]['ApplicationID']; ?>">Delete</a></td>
                    </tr>
                    <?php endfor;?>
                </table>  
                <br>
                <form action="AdminDeleteWithdrawn.php">
                    <input type="submit" value="Delete Withdrawn Customers" class="btn btn-danger" name="delete"> 
                </form>
                <br>
                <form action="/Admin/AdminPDFReport.php">
                    <input class="btn btn-primary" type="submit" value="Generate PDF Report" name ="submit"> 
                </form>
                <br>

            </div>
        </div>

   </main>
</div>

<?php require("../Footer.php");?>
