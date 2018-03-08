<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 08/03/2018
 * Time: 21:16
 */
include "sess_ctrl.php";
include"header.php";
include"navbar.php";
include"menu.php";?>

<?php

$limit = 7;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM VEHICLE_REG_TABLE";
$rs_result = mysqli_query($con, $sql);
$count=1;
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Registered Vehicles</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>NAME</th>
                <th>VEHICLE TYPE</th>
                <th>VEHICLE DETAILS</th>
                <th>DELETE</th>

            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($rs_result)) {
                ?>
                <tr>
                    <td><?php echo $count;$count++ ?></td>
                    <td><?php echo $row["Vehicle_Id"]; ?></td>
                    <td><?php echo $row["Vehicle_Name"];?></td>
                    <td><?php echo $row["Vehicle_Type"]; ?></td>
                    <td><?php echo $row["Vehicle_Details"]; ?></td>
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
                <th>NAME</th>
                <th>VEHICLE TYPE</th>
                <th>VEHICLE DETAILS</th>
                <th>DELETE</th>

            </tr>
            </tfoot>
        </table>
    </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add Vehicle</button>

<div class="modal modal-default fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Vehicle</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="new_vehicle.php">
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Vehicle ID" name="Vehicle_Id">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="Vehicle_Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Vehicle Type" name="Vehicle_Type">
                    </div>
                    <textarea id="editor1" class="textarea" name="Vehicle_Details" style="width: 100%; height: 5px; font-size: 5px; line-height: 10px; border: 1px solid #dddddd; padding: 5px;"></textarea>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="vehicle">Save changes</button>
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

<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>