<?php
$servername = "localhost";
$user = "dmai1994_user";
$pass = "bossboy12";
$dbname = "dmai1994_tutor";

$connection = mysqli_connect($servername, $user, $pass, $dbname);

if(!mysqli_connect($servername, $user,  $pass, $dbname))
{
    exit('Error: could not establish database connection');
}
if(!mysqli_select_db($connection, $dbname))
{
    exit('Error: could not select the database');
}

?>
