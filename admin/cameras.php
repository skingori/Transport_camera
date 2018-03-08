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

$sql = "SELECT * FROM CAMERA_TABLE";
$rs_result = mysqli_query($con, $sql);
$count=1;
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Registered Cameras</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>NO</th>
                <th>CAMERA MODEL</th>
                <th>SERIAL NUMBER</th>
                <th>CAMERA IP</th>
                <th>LOCATION</th>
                <th>DELETE</th>

            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($rs_result)) {
                ?>
                <tr>
                    <td><?php echo $count;$count++ ?></td>
                    <td><?php echo $row["camera_No"]; ?></td>
                    <td><?php echo $row["camera_Model"];?></td>
                    <td><?php echo $row["camera_Serial_No"]; ?></td>
                    <td><?php echo $row["camera_IP"]; ?></td>
                    <td><?php echo $row["camera_Location"]; ?></td>
                    <td><a href="del.php?deluser=<?php echo $row["Login_Id"]; ?>" class="btn-sm btn-danger">Delete</a></td>
                </tr>
                <?php
            };
            ?>
            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>NO</th>
                <th>CAMERA MODEL</th>
                <th>SERIAL NUMBER</th>
                <th>CAMERA IP</th>
                <th>LOCATION</th>
                <th>DELETE</th>

            </tr>
            </tfoot>
        </table>
    </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add New Camera</button>

<div class="modal modal-default fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Camera</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="new_cam.php">
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Camera No" name="camera_No">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Model" name="camera_Model">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Serial Number" name="camera_Serial_No">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Camera IP" name="camera_IP">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Camera Location" name="camera_Location">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="camera">Save changes</button>
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

