<?php
$servername ="localhost";
$dBUser = "root";
$dBPassword ="";
$dBName = "loginsystem";

$conn = mysqli_connect($servername, $dBUser, $dBPassword, $dBName );

If(!$conn){

die("Connection Failed:" .mysqli_connect_error());

}