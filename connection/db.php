<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 08/03/2018
 * Time: 19:00
 */
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "root");
define("DB", "Const");

$con = mysqli_connect(HOST, USER, PASSWORD, DB) OR DIE("Impossible to access to DB : " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}