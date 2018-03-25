<?php
include "sess_ctrl.php";
//make user update profile
$check_ = $con->query("SELECT Customer_Id FROM Customer_Table WHERE Customer_Id='$uid' ");
$count=$check_->num_rows;

if ($count==0) {

    header('Location:my_profile.php');
}else{

    null;

}
//

include"header.php";
include"navbar.php";
include"menu.php";?>

<?php


$limit = 7;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM Construction WHERE Construction_Id NOT IN(SELECT Application_Cons_Id FROM Job_Application)";
$rs_result = mysqli_query($con, $sql);
$count=1;
?>
    <div class="box">
    <div class="box-header">
        <h3 class="box-title">REGISTERED CONSTRUCTIONS</h3>
    </div>
    <div class="box-body">
    <table id="table" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>CONST CODE</th>
            <th>NAME</th>
            <th>CONST SITE</th>
            <th>CONST OWNER</th>
            <th>ENGINEER</th>
            <th>APPLY</th>

        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($rs_result)) {
            ?>
            <tr>
                <td><?php echo $count;$count++ ?></td>
                <td><?php echo $row["Construction_Id"]; ?></td>
                <td><?php echo $row["Construction_Name"]; ?></td>
                <td><?php echo $row["Construction_Site"]; ?></td>
                <td><?php echo $row["Construction_Owner"]; ?></td>
                <td><?php echo $row["Construction_Engineer"]; ?></td>
                <td><a href="crud.php?app=<?php echo $row["Construction_Id"]; ?>" class="btn-sm btn-primary">Apply</a></td>
            </tr>
            <?php
        };
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th>#</th>
            <th>CONST CODE</th>
            <th>NAME</th>
            <th>CONST SITE</th>
            <th>CONST OWNER</th>
            <th>ENGINEER</th>
            <th>APPLY</th>

        </tr>
        </tfoot>
    </table>
    </div>
    </div>

<?php include"footer.php";?>

<script>
    $(function () {
        $('#table').DataTable()
        $('#').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
