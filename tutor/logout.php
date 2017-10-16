<?php
include 'header.php';
include 'connect.php';
include 'login.php';
//starts a new session and unsets username and password
session_destroy();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION['signed_in']);
echo '<br><br><br><br><br><br><br><br>';
echo '<h1 id="red">You are now logged out</h1>';
header('Refresh: .5; URL = http://www.davidqmai.com/tutor/home.php');
?>
