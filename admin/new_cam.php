<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 08/03/2018
 * Time: 22:04
 */

session_start();

include '../connection/db.php';

$username=$_SESSION['logname'];

if(isset($_POST['camera'])) {

    $camera_No=$_POST['camera_No'];
    $camera_Model=$_POST['camera_Model'];
    $camera_Serial_No=$_POST['camera_Serial_No'];
    $camera_IP=$_POST['camera_IP'];
    $camera_Location=$_POST['camera_Location'];


    $sql = "INSERT INTO CAMERA_TABLE(
            
             
             camera_No
            ,camera_Model
            ,camera_Serial_No
            ,camera_IP
            ,camera_Location
            
           
            ) VALUES(
            
               '$camera_No',
               '$camera_Model',
               '$camera_Serial_No',
               '$camera_IP',
               '$camera_Location'
      
            )";

    if ($con->multi_query($sql) === TRUE) {

        header('Location: cameras.php');

    } else {

        header('Location: cameras.php');

        echo $con->error;

    }

    $con->close();
}