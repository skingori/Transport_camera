<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 25/03/2018
 * Time: 16:45
 */
session_start();

if (isset($_SESSION['logname']) && ($_SESSION['rank'])) {
    switch($_SESSION['rank']) {

        case 2:
            header('location:../user/index.php');//redirect to  page
            break;

    }
}elseif(!isset($_SESSION['logname']) && !isset($_SESSION['rank'])) {
    header('Location:../sessions.php');
}
else
{

    header('Location:index.php');
}

include '../connection/db.php';
$username=$_SESSION['logname'];

if (isset($_POST['dates'])) {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

}
//$result1 = mysqli_query($con, "SELECT * FROM Payment_Table WHERE Payment_Date >='$date1%' AND Payment_Date <='$date2%'");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
</head>
<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class=""></i> CONSTRUCTION SYSTEM.
                    <small class="pull-right">Date: <?php echo date('d:m:Y') ?></small>
                    <!--<img style='width: 80%;height: 190px; text-align: center' src='../logo-head/logo-head.png'>-->
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>Construction Ministry.</strong><br>
                    P.O.BOX 0004-00200<br>
                    Nairobi Kenya<br>
                    Phone: (+254)03039347<br>
                    Email: info@construction.co.ke
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Printed By : <?php echo $username; ?>
                <address>

                    <!-- FOR USER PROFILE -->

                    <strong></strong><br>
                </address>
                <!-- FOR USER PROFILE -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <label><i>"For all constructions"</i></label>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <style>

            .test {
                float: left;
                width: 90%;
                height: auto;
                border: 0;
                font-family: 'Consolas', Seravek, serif;
                background-color: inherit;
                overflow: hidden;
                resize: none;

            }

        </style>
        <div class="row">
            <div class="col-xs-12 table-responsive">

                <hr style=" border-top: 1px dotted #8c8b8b;">
                <h4 class="heading">CUSTOMER INFORMATION:</h4>
                <table class="table table-striped table-bordered" style="font-family: 'Palatino','serif',Consolas;font-size: small">
                    <?php
                    $sql = "SELECT * FROM Customer_Table";
                    $rs_result = mysqli_query($con, $sql);
                    $test=1;
                    ?>

                    <thead class="">
                    <tr>
                        <th>#</th>
                        <th>CUSTOMER ID</th>
                        <th>FULL NAME</th>
                        <th>CUSTOMER EMAIL</th>
                        <th>CONTACT</th>
                        <th>ADDRESS</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row2 = mysqli_fetch_assoc($rs_result)) {
                        ?>
                        <tr>
                            <td><textarea class="test"><?php echo $test;$test++; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Customer_Id"]; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Customer_Name"]; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Customer_Email"]; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Customer_Number"]; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Customer_Address"]; ?></textarea></td>
                        </tr>
                        <?php
                    };
                    ?>
                    </tbody>

                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">

                <hr style=" border-top: 1px dotted #8c8b8b;">
                <h4 class="heading">CONSTRUCTION INFORMATION:</h4>
                <table class="table table-striped table-bordered" style="font-family: 'Palatino','serif',Consolas;font-size: small">
                    <?php
                    $sql = "SELECT * FROM Construction";
                    $rs_result = mysqli_query($con, $sql);
                    $test=1;
                    ?>

                    <thead class="">
                    <tr>
                        <th>#</th>
                        <th>CONST ID</th>
                        <th>NAME</th>
                        <th>SITE</th>
                        <th>OWNER</th>
                        <th>ENGINEER</th>
                        <th>DESCRIPTION</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row2 = mysqli_fetch_assoc($rs_result)) {
                        ?>
                        <tr>
                            <td><textarea class="test"><?php echo $test;$test++; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Construction_Id"]; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Construction_Name"]; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Construction_Site"]; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Construction_Owner"]; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Construction_Engineer"]; ?></textarea></td>
                            <td><textarea class="test"><?php echo $row2["Construction_Desc"]; ?></textarea></td>
                        </tr>
                        <?php
                    };
                    ?>
                    </tbody>

                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Note: This is an electronic generated copy.<br>
                    The receipt which appears on the screen has also been sent to the e-mail address of the customer.
                    Please keep a copy for your records.
                </p>
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
