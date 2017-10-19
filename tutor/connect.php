<?php
$servername = "localhost";
$user = "dmai1994_user";
$pass = "*******";
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

if(isset($_POST['ban'])) {
  $banned = $_POST['ban'];
  $sqlBan = "UPDATE Users SET status='banned' WHERE userID='$banned'";
  mysqli_query($connection, $sqlBan);
  header('Refresh: .1; URL = ban.php');
}
if(isset($_POST['unban'])) {
  $unbanned = $_POST['unban'];
  $sqlBan = "UPDATE Users SET status='user' WHERE userID='$unbanned'";
  mysqli_query($connection, $sqlBan);
  header('Refresh: .1; URL = ban.php');
}

?>
