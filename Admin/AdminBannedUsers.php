<?php require("../NavigationBarAdmin.php");
include_once("AdminBannedUsersSQL.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['admin'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['admin']; 
$user = getUsers();
?>

<!DOCTYPE html>
<html>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <br><h3>Banned Users</h3><br>

        <?php if(isset($_GET['unbanned'])): ?>
            <div class="alert alert-success alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
                The user has been unbanned
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <table class="table table-striped">
        <thead class="table-dark">
            <td>ID</td>
            <td>First Name</td>
            <td>Surname</td>
            <td>Email Address</td>
            <td>Date Of Birth</td>
            <td>Gender</td>
            <td>Actions</td>
        </thead>

        <?php
            for ($i=0; $i<count($user); $i++):
        ?>
        <tr>
            <td><?php echo $user[$i]['id']?></td>
            <td><?php echo $user[$i]['firstName']?></td>
            <td><?php echo $user[$i]['surname']?></td>
            <td><?php echo $user[$i]['emailAddress']?></td>
            <td><?php echo $user[$i]['dateOfBirth']?></td>
            <td><?php echo $user[$i]['gender']?></td>
            <td><a href="AdminUnbanUser.php?id=<?php echo $user[$i]['id']; ?>"><button class="btn btn-primary">Unban User</button></a></td>
        </tr>
        <?php endfor;?>
        </table>  

        </div>
    </div>
</div>


<?php require("../Footer.php");?>

</body>
</html>


