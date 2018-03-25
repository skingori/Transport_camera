<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 08/03/2018
 * Time: 21:08
 */
session_start();

include '../connection/db.php';

$username=$_SESSION['logname'];

if(isset($_POST['resource'])) {

    $Resource_Id=$_POST['Resource_Id'];
    $Resource_Type=$_POST['Resource_Type'];
    $Resource_Name=$_POST['Resource_Name'];
    $Resource_Cost=$_POST['Resource_Cost'];
    $Resource_Desc=$_POST['Resource_Desc'];


    $sql = "INSERT INTO Resources(
            
             
             Resource_Id
            ,Resource_Type
            ,Resource_Name
            ,Resource_Cost
            ,Resource_Desc
            
           
            ) VALUES(
            
               '$Resource_Id',
               '$Resource_Type',
               '$Resource_Name',
               '$Resource_Cost',
               '$Resource_Desc'
      
            )";

    if ($con->multi_query($sql) === TRUE) {

        header('Location: Resources.php');

    } else {

        header('Location: Resources.php');

        echo $con->error;

    }

    $con->close();
}