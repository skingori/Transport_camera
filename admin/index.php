<?php
include "sess_ctrl.php";
include"header.php";
include"navbar.php";
include"menu.php";?>

<?php

$limit = 7;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM DRIVER_PROFILE_TABLE";
$rs_result = mysqli_query($con, $sql);
$count=1;
?>
    <div class="box">
    <div class="box-header">
        <h3 class="box-title">Registered Drivers</h3>
    </div>
    <div class="box-body">
    <table id="table" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>FULL NAME</th>
            <th>CONTACTS</th>
            <th>PAYROLL NUMBER</th>
            <th>DELETE</th>

        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($rs_result)) {
            ?>
            <tr>
                <td><?php echo $count;$count++ ?></td>
                <td><?php echo $row["Driver_Id"]; ?></td>
                <td><?php echo $row["Driver_First_Name"]; ?>&nbsp;<?php echo $row["Driver_Last_Name"]; ?></td>
                <td><?php echo $row["Driver_Phone_No"]; ?></td>
                <td><?php echo $row["Driver_Payroll_No"]; ?></td>
                <td><a href="del.php?deluser=<?php echo $row["Login_Id"]; ?>" class="btn-sm btn-danger">Delete</a></td>
            </tr>
            <?php
        };
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>FULL NAME</th>
            <th>CONTACTS</th>
            <th>PAYROLL NUMBER</th>
            <th>DELETE</th>

        </tr>
        </tfoot>
    </table>
    </div>
    </div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add Driver</button>

<div class="modal modal-default fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Driver</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="new_driv.php">
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Driver ID" name="Driver_Id">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name" name="Driver_First_Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name" name="Driver_Last_Name">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" placeholder="Phone Number" name="Driver_Phone_No">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Payroll Number" name="Driver_Payroll_No">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="driver">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
