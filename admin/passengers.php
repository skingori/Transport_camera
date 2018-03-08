<?php
include "sess_ctrl.php";
include"header.php";
include"navbar.php";
include"menu.php";?>

<?php

$limit = 7;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM PASSAGER_DETAIL_TABLE";
$rs_result = mysqli_query($con, $sql);
$count=1;
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Registered Passengers</h3>
    </div>
    <div class="box-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>FULL NAME</th>
                <th>CONTACTS</th>
                <th>ADDRESS</th>
                <th>SEAT NO</th>
                <th>DELETE</th>

            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($rs_result)) {
                ?>
                <tr>
                    <td><?php echo $count;$count++ ?></td>
                    <td><?php echo $row["Passenger_ID"]; ?></td>
                    <td><?php echo $row["passenger_FirstName"]; ?>&nbsp;<?php echo $row["passenger_LastName"]; ?></td>
                    <td><?php echo $row["passenger_phone_No"]; ?></td>
                    <td><?php echo $row["passenger_adress"]; ?></td>
                    <td><?php echo $row["passenger_seat_No"]; ?></td>
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
                <th>ADDRESS</th>
                <th>SEAT NO</th>
                <th>DELETE</th>

            </tr>
            </tfoot>
        </table>
    </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add Passenger</button>

<div class="modal modal-default fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Passenger</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="new_pass.php">
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Passenger ID" name="Passenger_ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name" name="passenger_FirstName">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name" name="passenger_LastName">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" placeholder="Phone Number" name="passenger_phone_No">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Address" name="passenger_adress">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Seat No" name="passenger_seat_No">
                    </div>
                    <div class="form-group">
                        <select name="Passenger_Status" class="form-control">
                            <option selected="">..Select Status</option>
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="pass">Save changes</button>
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
