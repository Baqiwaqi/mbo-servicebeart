<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 6-3-2019
 * Time: 11:53
 */
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "servicebeurt";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}
else{

}