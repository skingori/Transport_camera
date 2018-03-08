<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 08/03/2018
 * Time: 21:43
 */

session_start();

include '../connection/db.php';

$username=$_SESSION['logname'];

if(isset($_POST['vehicle'])) {

    $Vehicle_Id=$_POST['Vehicle_Id'];
    $Vehicle_Name=$_POST['Vehicle_Name'];
    $Vehicle_Type=$_POST['Vehicle_Type'];
    $Vehicle_Details=$_POST['Vehicle_Details'];


    $sql = "INSERT INTO VEHICLE_REG_TABLE(
            
             
             
             Vehicle_Id
            ,Vehicle_Name
            ,Vehicle_Type
            ,Vehicle_Details
            
           
            ) VALUES(
            
               '$Vehicle_Id',
               '$Vehicle_Name',
               '$Vehicle_Type',
               '$Vehicle_Details'
      
            )";

    if ($con->multi_query($sql) === TRUE) {

        header('Location: vehicles.php');

    } else {

        header('Location: vehicles.php');

        echo $con->error;

    }

    $con->close();
}