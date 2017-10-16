<?php include 'connect.php';
include 'login.php';
include 'header.php';


if($_POST)
{
    //assigns the post values to a variable for ease of use
        $tutor = $_POST['tutor'];
        $hours = $_POST['hours'];
        $time = $_POST['time'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $price = $_POST['price'];

    //checks for length and other validation errors in the form
        $errors = array();
        if(empty($date) OR strlen($date) > 10)
        {
            $errors['date'] = " (Enter a valid date)";
        }
        if(strlen($message) < 5 OR strlen($message) > 50)
        {
            $errors['message'] = " ( Message must be between 5 and 50 characters)";
        }
        if(count($errors) == 0){
             $sql = "INSERT INTO Requests(message, date, time, currentStatus, price, hours, FK_userID, FK_tutorID) VALUES ('$message', '$date', '$time', 'Undecided', '$price', '$hours', '$userID', '$tutor')";
             $result = mysqli_query($connection, $sql);
             ##If theres an error, it will echo, or else it will send you back to where your comment was
             if (!$result) {
                     echo 'Error' . mysql_error();
               }
        }
  }


?>
<div id="request">
<div id="requestleft">
  <h3>Request a session</h3>
<form method="post" id="requestform">
    <label for="tutor">Tutor</label>
  <select name="tutor">
        <option value="1"> David Mai </option>
        <option value="2"> Peter Cao</option>
        <option value="3"> JP Peterson</option>
  </select>
<label for="hours">Hours</label>
<select id="hours" name="hours" onchange="calculator()">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select>
<label for="time">Time</label>
<select id="time" name="time">
    <option value="9AM">9AM</option>
    <option value="10AM">10AM</option>
    <option value="11AM">11AM</option>
    <option value="12PM">12PM</option>
    <option value="1PM">1PM</option>
    <option value="2PM">2PM</option>
    <option value="3PM">3PM</option>
    <option value="4PM">4PM</option>
    <option value="5PM">5PM</option>
</select>
<label for="date">Date <small id="red"> <?php if(isset($errors['date'])) echo $errors['date']; echo '</br>'?> </small></label>
<input type="text" name="date" placeholder="MM-DD-YYYY" value="<?php if(isset($_POST['date'])) echo $_POST['date']; ?>">
<label for="message">Message <small id="red"> <?php if(isset($errors['message'])) echo $errors['message']; echo '</br>';?> </small></label>
<input type="text" name="message" placeholder="Message" value="<?php if(isset($_POST['message'])) echo $_POST['message']; ?>">
<label for="price">Price</label>
<input type="text" id="price" name="price" value="$25.00" readonly><br>
<input type="submit" value="Submit" />
</form>
</div>

<div id="requestleft">
<table>
  <thead>
    <h3>Your Requests</h3>
    <tr>
      <th>Hours</th>
      <th>Time</th>
      <th>Date</th>
      <th>Price</th>
      <th>Message</th>
      <th>Status</th>
    </tr>
  </thead>
<?php
$sql1= "SELECT requestID, hours, time, date, price, message, currentStatus FROM Requests
INNER JOIN Users ON Requests.FK_userID = Users.userID
WHERE FK_userID='$userID' ORDER BY requestID DESC";
$result = mysqli_query($connection, $sql1);
while($row = mysqli_fetch_assoc($result)){
  $requestID = $row['requestID'];
  echo '<tbody>
      <tr>
        <td>' . $row['hours'] . '</td>
        <td>' . $row['time'] . '</td>
        <td>' . $row['date'] . '</td>
        <td>' . $row['price'] . '</td>
        <td>' . $row['message'] . '</td>
        <td>';
         if($row['currentStatus'] == 'Accepted'){echo '<strong id="accepted" href>' . $row['currentStatus'] . '</strong>' . '</td></tr>';}
         elseif($row['currentStatus'] == 'Denied'){echo '<strong id="denied" href>' . $row['currentStatus'] . '</strong>' . '</td></tr>';}
         else{echo '<strong id="undecided" href> Undecided </strong>';
         }
;
} ?>
</tbody>
</table>
</div>
</div>
