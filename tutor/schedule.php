<?php
include 'connect.php';
include 'login.php';
include 'header.php';
?>

<div class="schedule">
<div class ="scheduleleft">
<table>
  <thead>
    <h3>Requests</h3>
    <tr>
      <th>Name</th>
      <th>Hours</th>
      <th>Time</th>
      <th>Date</th>
      <th>Price</th>
      <th>Message</th>
      <th>Status</th>
    </tr>
  </thead>

<?php
$sql1= "SELECT requestID, fname, hours, time, date, price, message, currentStatus FROM Requests
INNER JOIN Users ON Requests.FK_userID = Users.userID
WHERE FK_tutorID='$userID'";
$result = mysqli_query($connection, $sql1);
while($row = mysqli_fetch_assoc($result)){
  $requestID = $row['requestID'];
  echo '<tbody>
      <tr>
        <td>' . $row['fname'] . '</td>
        <td>' . $row['hours'] . '</td>
        <td>' . $row['time'] . '</td>
        <td>' . $row['date'] . '</td>
        <td>' . $row['price'] . '</td>
        <td>' . $row['message'] . '</td>
        <td>';
         if($row['currentStatus'] == 'Accepted'){echo '<strong id="accepted" href>' . $row['currentStatus'] . '</strong>' . '</td></tr>';}
         elseif($row['currentStatus'] == 'Denied'){echo '<strong id="denied" href>' . $row['currentStatus'] . '</strong>' . '</td></tr>';}
         else{echo
             '<a id="accepted" href="update.php?type=accept&requestID='
           . $requestID . '"> Accept</a>'
           . '<a id="denied" href="update.php?type=deny&requestID='
           . $requestID . '"> Denied</a>'
           . '</td></tr>';
         }
;
} ?>

</tbody>
</table>
</div>

<div class ="scheduleright">
  <table>
    <thead>
      <h3>Upcoming Sessions</h3>
      <tr>
        <th>Name</th>
        <th>Hours</th>
        <th>Time</th>
        <th>Date</th>
        <th>Message</th>
      </tr>
    </thead>
  <?php
  $sql1= "SELECT fname, hours, time, date, message FROM Requests
  INNER JOIN Users ON Requests.FK_userID = Users.userID
  WHERE currentStatus='Accepted' AND FK_tutorID='$userID'";
  $result = mysqli_query($connection, $sql1);
  while($row = mysqli_fetch_assoc($result)){
    echo '<tbody>
        <tr>
          <td>' . $row['fname'] . '</td>
          <td>' . $row['hours'] . '</td>
          <td>' . $row['time'] . '</td>
          <td>' . $row['date'] . '</td>
          <td>' . $row['message'] . '</td>
        </tr>';
  } ?>
</tbody>
</table>
</div>
</div>






<div class="search">
<div class ="searchleft">
<?php

echo '<form method="post">
<h3>Requests by name</h3> <input type="text" name="fname" /><br />
<input type="submit" name="submit" value="Submit" />
</form>';

if(isset($_POST['fname'])){
$fname = $_POST['fname'] ;
$sql = "SELECT fname, time, date, price, message, currentStatus FROM Requests INNER JOIN Users ON Requests.FK_userID = Users.userID WHERE fname='$fname' AND FK_tutorID='$userID'";
$result = mysqli_query($connection, $sql);
echo '<table>
  <thead>
    <h3>Requests</h3>
    <tr>
      <th>Name</th>
      <th>Time</th>
      <th>Date</th>
      <th>Price</th>
      <th>Message</th>
      <th>Status</th>
    </tr>
  </thead>';

while ($row = mysqli_fetch_assoc($result))
{
  echo '<tbody>
      <tr>
        <td>' . $row['fname'] . '</td>
        <td>' . $row['time'] . '</td>
        <td>' . $row['date'] . '</td>
        <td>' . $row['price'] . '</td>
        <td>' . $row['message'] . '</td>
        <td>';
        if($row['currentStatus'] == 'Accepted'){echo '<strong id="accepted" href>' . $row['currentStatus'] . '</strong>' . '</td></tr>';}
        elseif($row['currentStatus'] == 'Denied'){echo '<strong id="denied" href>' . $row['currentStatus'] . '</strong>' . '</td></tr>';}
}
}
?>
</div>

</div>
