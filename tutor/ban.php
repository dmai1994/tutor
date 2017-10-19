<?php
include 'connect.php';
include 'login.php';
include 'header.php';
?>
<div class="schedule">

<div class ="scheduleleft">


<table>
  <thead>
    <h3>Accounts</h3>
    <tr>
      <th>Ban</th>
      <th>Username</th>
      <th>Password</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>School</th>
    </tr>
  </thead>

<?php
$sql1= "SELECT userID, username, password, fname, lname, school FROM Users
WHERE status='user'";
$result = mysqli_query($connection, $sql1);
while($row = mysqli_fetch_assoc($result)){
  $banID = $row['userID'];
  echo '<form method="post">';
  echo '<tbody>
      <tr>
        <td>' . '<input type="radio" name="ban" value="' . $banID . '">' . '</td>
        <td>' . $row['username'] . '</td>
        <td>' . $row['password'] . '</td>
        <td>' . $row['fname'] . '</td>
        <td>' . $row['lname'] . '</td>
        <td>' . $row['school'] . '</td>
        <td>' . '</td></tr>';
         }
    echo '<input type="submit" value="Ban Account" />
  </form>';
?>

</tbody>
</table>
</div>

<div class="scheduleright">
  <table>
    <thead>
      <h3>Banned Accounts</h3>
      <tr>
        <th>Unban</th>
        <th>Username</th>
        <th>Password</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>School</th>
      </tr>
    </thead>

  <?php
  $sql1= "SELECT userID, username, password, fname, lname, school FROM Users
  WHERE status='banned'";
  $result = mysqli_query($connection, $sql1);
  while($row = mysqli_fetch_assoc($result)){
    $unbanID = $row['userID'];
    echo '<form method="post">';
    echo '<tbody>
        <tr>
        <td>' . '<input type="radio" name="unban" value="' . $unbanID . '">' . '</td>
          <td>' . $row['username'] . '</td>
          <td>' . $row['password'] . '</td>
          <td>' . $row['fname'] . '</td>
          <td>' . $row['lname'] . '</td>
          <td>' . $row['school'] . '</td>
          <td>' . '</td></tr>';
           }
           echo '<input type="submit" value="Unban Account" />
         </form>';
  ?>

  </tbody>
  </table>
</div>
</div>

