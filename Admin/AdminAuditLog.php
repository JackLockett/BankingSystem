<?php include("../NavBarAdmin.php");
include_once("AdminAuditLogSQL.php");?>

<?php $audit = getAudit(); ?>

<div class="container pb-5">
    <main role="main" class="pb-3">
        
        <h1>Audit Logs</h1><br>
        <div class="row">
            <div class="col-12">
                <?php if(isset($_GET['deletedaudit'])): ?>
                <div class="alert alert-danger alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
                    The Audit Log has been deleted
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>Audit ID</td>
                        <td>Audit Logs</td>
                        <td>Actions</td>
                    </thead>

                    <?php
                        for ($i=0; $i<count($audit); $i++):
                    ?>
                    <tr>
                        <td><?php echo $audit[$i]['AuditID']?></td>
                        <td><?php echo $audit[$i]['Log']?></td>
                        <td><a href="AdminAuditDelete.php?id=<?php echo $audit[$i]['AuditID']; ?>">Delete</a></td>
                    </tr>
                    <?php endfor;?>
                </table>    
            </div>
        </div>

   </main>
</div>

<?php require("../Footer.php");?>
