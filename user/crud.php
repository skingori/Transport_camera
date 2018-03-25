<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 17/03/2018
 * Time: 13:11
 */


include("../connection/db.php");
include "sess_ctrl.php";

$chars = array(0,1,2,3,4,5,6,7,8,9,'A','b','C');
$serial = '';
$max = count($chars)-1;
for($i=0;$i<12;$i++){
$serial .=(!($i % 4) && $i ? '-' : '').$chars[rand(0, $max)];
}


if (isset($_GET['del'])){
    //getting id of the data from url
    $id = $_GET['del']; //deletin milk
    //deleting the row from table
    $result = mysqli_query($con, "DELETE FROM Style_Table WHERE Style_Id=$id ");
//$result = mysqli_query($con, "DELETE FROM login_table WHERE login_username=$id");

//redirecting to the display page (index.php in our case)
    header("Location:styles.php");
}

elseif(isset($_GET['dels'])) {
    $id = $_GET['dels']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Salon_Table WHERE Salon_Id=$id");

    header("Location:salons.php");

}
elseif(isset($_GET['delst'])) {
    $id = $_GET['delst']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Stylist_Table WHERE Stylist_Id=$id");

    header("Location:stylists.php");

}

elseif(isset($_GET['app'])) {
    $id = $_GET['app']; //deleting feeds
    $result = mysqli_query($con, "SELECT * FROM Customer_Table WHERE Customer_Id='$uid'");

    while($res = mysqli_fetch_array($result))
    {
        $Customer_Name= $res['Customer_Name'];
        $Customer_Email= $res['Customer_Email'];
    }


    $sql = "INSERT INTO Job_Application(
            
              Application_Id
            ,Application_Cons_Id
            ,Application_User_Name
            ,Application_User_Email
            ,Application_Date
            ,Applicatin_Status
           
            ) VALUES(
            
               '$serial',
               '$id',
               '$Customer_Name',
               '$Customer_Email',
               NOW(),
               'Applied'
               
            )";

    if ($con->multi_query($sql) === TRUE) {

        header('Location: index.php');

    } else {

        header('Location: index.php');

        echo $con->error;

    }

    $con->close();

}

else{
    header('Location:index.php');
}