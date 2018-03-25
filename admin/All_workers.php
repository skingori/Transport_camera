<?php
include "sess_ctrl.php";
include"header.php";
include"navbar.php";
include"menu.php";?>

<?php

$limit = 7;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM Customer_Table";
$rs_result = mysqli_query($con, $sql);
$count=1;
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Approved Workers</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>EMPLOYER ID</th>
                <th>FULL NAME</th>
                <th>EMAIL</th>
                <th>CONTACT</th>
                <th>ADDRESS</th>
                <th>DELETE</th>

            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($rs_result)) {
                ?>
                <tr>
                    <td><?php echo $count;$count++ ?></td>
                    <td><?php echo $row["Customer_Id"]; ?></td>
                    <td><?php echo $row["Customer_Name"]; ?></td>
                    <td><?php echo $row["Customer_Email"]; ?></td>
                    <td><?php echo $row["Customer_Number"]; ?></td>
                    <td><?php echo $row["Customer_Address"]; ?></td>
                    <td><a href="del.php?work=<?php echo $row["Customer_Id"]; ?>" class="btn-sm btn-danger">Delete</a></td>
                </tr>
                <?php
            };
            ?>
            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>EMPLOYER ID</th>
                <th>FULL NAME</th>
                <th>EMAIL</th>
                <th>CONTACT</th>
                <th>ADDRESS</th>
                <th>DELETE</th>

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
