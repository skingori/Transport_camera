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

if(isset($_POST['pass'])) {

    $Passenger_ID=$_POST['Passenger_ID'];
    $passenger_FirstName=$_POST['passenger_FirstName'];
    $passenger_LastName=$_POST['passenger_LastName'];
    $passenger_phone_No=$_POST['passenger_phone_No'];
    $passenger_adress=$_POST['passenger_adress'];
    $passenger_seat_No=$_POST['passenger_seat_No'];
    $Passenger_Status=$_POST['Passenger_Status'];


    $sql = "INSERT INTO PASSAGER_DETAIL_TABLE(
            
             
             Passenger_ID
            ,passenger_FirstName
            ,passenger_LastName
            ,passenger_phone_No
            ,passenger_adress
            ,passenger_seat_No
            ,Passenger_Status
            
           
            ) VALUES(
            
               '$Passenger_ID',
               '$passenger_FirstName',
               '$passenger_LastName',
               '$passenger_phone_No',
               '$passenger_adress',
               '$passenger_seat_No',
               '$Passenger_Status'
      
            )";

    if ($con->multi_query($sql) === TRUE) {

        header('Location: passengers.php');

    } else {

        header('Location: passengers.php');

        echo $con->error;

    }

    $con->close();
}