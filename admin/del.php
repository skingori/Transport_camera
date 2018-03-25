<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 17/03/2018
 * Time: 13:12
 */

include("../connection/db.php");

if (isset($_GET['const'])){
    //getting id of the data from url
    $id = $_GET['const']; //deletin milk
    //deleting the row from table
    $result = mysqli_query($con, "DELETE FROM Construction WHERE Id=$id ");
//$result = mysqli_query($con, "DELETE FROM login_table WHERE login_username=$id");

//redirecting to the display page (index.php in our case)
    header("Location:index.php");
}


elseif (isset($_GET['res'])){
    $id =$_GET['res']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Resources WHERE Id=$id ");
    header("Location:Resources.php");
}

elseif (isset($_GET['app'])){
    $id =$_GET['app']; //deleting feeds
    $result = mysqli_query($con, "UPDATE Job_Application SET Applicatin_Status='Approved' WHERE Id=$id");

    header("Location:Applications.php");
}

elseif (isset($_GET['appl'])){
    $id =$_GET['appl']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Job_Application WHERE Id=$id ");
    header("Location:Applications.php");
}

elseif(isset($_GET['deluser'])) {
    $id = $_GET['deluser']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Login_Table WHERE Login_Id=$id");

    header("Location:all_users.php");

}
elseif(isset($_GET['work'])) {
    $id = $_GET['work']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Customer_Table WHERE Customer_Id=$id");

    header("Location:All_workers.php");

}
else{
    header('Location:index.php');
}