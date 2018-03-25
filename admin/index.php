<?php
include "sess_ctrl.php";
include"header.php";
include"navbar.php";
include"menu.php";?>

<?php

$limit = 7;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM Construction";
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
            <th>DELETE</th>

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
                <td><a href="del.php?const=<?php echo $row["Id"]; ?>" class="btn-sm btn-danger">Delete</a></td>
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
            <th>DELETE</th>

        </tr>
        </tfoot>
    </table>
    </div>
    </div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add Contract</button>

<div class="modal modal-default fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Contract</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="new_const.php">
                    <div class="form-group">
                        <?php
                        $chars = array(0,1,2,3,4,5,6,7,8,9,'A','b','C');
                        $serial = '';
                        $max = count($chars)-1;
                        for($i=0;$i<12;$i++){
                            $serial .=(!($i % 4) && $i ? '-' : '').$chars[rand(0, $max)];
                        }
                        ?>
                        <input type="text" class="form-control" value="<?php echo $serial; ?>" placeholder="Construction Code" name="Construction_Id" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Construction Name" name="Construction_Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Construction Site" name="Construction_Site">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Construction Owner" name="Construction_Owner">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" placeholder="Construction Engineer" name="Construction_Engineer">
                    </div>
                    <div class="form-group">
                        <textarea name="Construction_Desc" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="const">Save changes</button>
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
