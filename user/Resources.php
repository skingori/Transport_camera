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

$sql = "SELECT * FROM Resources";
$rs_result = mysqli_query($con, $sql);
$count=1;
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Registered Resources</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>RESOURCE ID</th>
                <th>TYPE</th>
                <th>RESOURCE NAME</th>
                <th>COST</th>
                <th>DESCRIPTION</th>

            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($rs_result)) {
                ?>
                <tr>
                    <td><?php echo $count;$count++ ?></td>
                    <td><?php echo $row["Resource_Id"]; ?></td>
                    <td><?php echo $row["Resource_Type"];?></td>
                    <td><?php echo $row["Resource_Name"]; ?></td>
                    <td><?php echo $row["Resource_Cost"]; ?></td>
                    <td><?php echo $row["Resource_Desc"]; ?></td>
                </tr>
                <?php
            };
            ?>
            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>RESOURCE ID</th>
                <th>TYPE</th>
                <th>RESOURCE NAME</th>
                <th>COST</th>
                <th>DESCRIPTION</th>

            </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="modal modal-default fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Resource</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="new_resource.php">
                    <div class="form-group">
                        <?php
                        $chars = array(0,1,2,3,4,5,6,7,8,9,'A','b','C');
                        $serial = '';
                        $max = count($chars)-1;
                        for($i=0;$i<12;$i++){
                            $serial .=(!($i % 4) && $i ? '-' : '').$chars[rand(0, $max)];
                        }
                        ?>
                        <input type="text" class="form-control" value="<?php echo $serial; ?>" placeholder="Resource Id" name="Resource_Id" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Resource type" name="Resource_Type">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Resource Name" name="Resource_Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Resource Cost" name="Resource_Cost">
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <textarea name="Resource_Desc" rows="5" class="form-control">Add More Data</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="resource">Save changes</button>
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

