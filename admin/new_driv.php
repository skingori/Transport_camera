<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 08/03/2018
 * Time: 20:34
 */
session_start();

include '../connection/db.php';

$username=$_SESSION['logname'];

if(isset($_POST['driver'])) {

    $Driver_Id=$_POST['Driver_Id'];
    $Driver_First_Name=$_POST['Driver_First_Name'];
    $Driver_Last_Name=$_POST['Driver_Last_Name'];
    $Driver_Phone_No=$_POST['Driver_Phone_No'];
    $Driver_Payroll_No=$_POST['Driver_Payroll_No'];


    $sql = "INSERT INTO DRIVER_PROFILE_TABLE(
            
             
              Driver_Id
            ,Driver_First_Name
            ,Driver_Last_Name
            ,Driver_Phone_No
            ,Driver_Payroll_No
            
           
            ) VALUES(
            
               '$Driver_Id',
               '$Driver_First_Name',
               '$Driver_Last_Name',
               '$Driver_Phone_No',
               '$Driver_Payroll_No'
      
            )";

    if ($con->multi_query($sql) === TRUE) {

        header('Location: index.php');

    } else {

        header('Location: index.php');

        echo $con->error;

    }

    $con->close();
}