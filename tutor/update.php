<?php include 'header.php';
      include 'connect.php';
      include 'login.php';

$type = $_GET['type'];
$requestID = $_GET['requestID'];

switch ($type) {
    case "accept":
        $sqlAccept = "UPDATE Requests SET currentStatus='Accepted' WHERE requestID= '$requestID'";
        mysqli_query($connection, $sqlAccept);
        header('Refresh: .1; URL = schedule.php');
        break;
    case "deny":
        $sqlDeny = "UPDATE Requests SET currentStatus='Denied' WHERE requestID= '$requestID'";
        mysqli_query($connection, $sqlDeny);
        header('Refresh: .1; URL = schedule.php');
        break;
}

?>
