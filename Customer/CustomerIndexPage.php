<?php 
 include("../NavBarCustomer.php");
 include("../Session.php");
 
 $path = "CustomerLogin.php"; 
     
 session_start(); 
 if (!isset($_SESSION['customer'])){
     session_unset();
     session_destroy();
     header("Location:".$path);
 }
 $user = $_SESSION['customer']; 
 checkSession ($path);

 function getCustomer (){
    global $user;
    $db = new SQLITE3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');
    $sql = "SELECT * FROM Customer WHERE ApplicationID='$user'";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    $arrayResult = [];
    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row;
    }
    return $arrayResult;
}

$customer = getCustomer();
?>

<div class="container bgColor">
    <main role="main" class="pb-3">

        <?php if(isset($_GET['updated'])): ?>
            <div class="alert alert-success alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
                Your details have been updated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <h1>Welcome to <span style = "color: #BA0046">Customer Area</h1>

        <br>

        <h2 style="text-align: center;">You are logged into: <span style = "color: #BA0046"><?php echo "$user" ?></h2>

        <br><br>

        <div class="col-12">
            <table class="table table-striped">
                <thead class="table-dark">
                    <td>Application ID</td>
                    <td>Product</td>
                    <td>Status</td>
                    <td>Actions</td>
                </thead>

                <?php
                    for ($i=0; $i<count($customer); $i++):
                ?>
                <tr>
                    <td><?php echo $customer[$i]['ApplicationID']?></td>
                    <td><?php echo $customer[$i]['Product']?></td>                    
                    <td><?php echo $customer[$i]['Status']?></td>
                    <td><a href="CustomerUpdate.php?ApplicationID=<?php echo $customer[$i]['ApplicationID']; ?>">Update</a>
                </tr>
                <?php endfor;?>
            </table>  
        </div>
    </main>
</div>

