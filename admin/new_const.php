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


if(isset($_POST['const'])) {

    $Construction_Id=$_POST['Construction_Id'];
    $Construction_Name=$_POST['Construction_Name'];
    $Construction_Site=$_POST['Construction_Site'];
    $Construction_Owner=$_POST['Construction_Owner'];
    $Construction_Engineer=$_POST['Construction_Engineer'];
    $Construction_Desc=$_POST['Construction_Desc'];


    $sql = "INSERT INTO Construction(
            
              Construction_Id
            ,Construction_Name
            ,Construction_Site
            ,Construction_Owner
            ,Construction_Engineer
            ,Construction_Desc
           
            ) VALUES(
            
               '$Construction_Id',
               '$Construction_Name',
               '$Construction_Site',
               '$Construction_Owner',
               '$Construction_Engineer',
               '$Construction_Desc'
               
            )";

    if ($con->multi_query($sql) === TRUE) {

        header('Location: index.php');

    } else {

        header('Location: index.php');

        echo $con->error;

    }

    $con->close();
}