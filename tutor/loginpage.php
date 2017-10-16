<?php include 'header.php';
include 'login.php';
include 'connect.php';


if($_POST){
      //creates an array to store errors
      $errors = array();
      //checks to see if username or password is empty and if it is, it adds an error
      if(empty($_POST['username']))
      {
          $errors['username'] = ' (Dont leave the username blank)';
      }
      if(empty($_POST['password']))
      {
          $errors['password'] = ' (Dont leave the password blank)';
      }
      //if there is nothing stored in errors array
      if(count($errors) == 0){
          $sql = "SELECT username, password, status
                  FROM Users
                  WHERE username = '" . $_POST['username'] . "'
                  AND password = '" . $_POST['password'] . "'";
          $result = mysqli_query($connection, $sql);
          //if nothing comes back from the query, then it messed up
          if(!$result)
          {
              echo 'Something went wrong while signing in. Please try again later.';
          }
          else
          {
              //if no rows come back, that means that there are no users with that username/pass
              if(mysqli_num_rows($result) == 0)
              {
                $errors['invalid'] = ' (Invalid Username/Password Combination)';
              }
              else
              {
                  $_SESSION['signed_in'] = true;
                  while($row = mysqli_fetch_assoc($result))
                  {
                      //assigns the username and password to the session for ease of access later
                      $_SESSION['username'] = $row['username'];
                      $_SESSION['password'] = $row['password'];
                      $status = $row['status'];
                  }
                  //refreshes the page
                  if($status != 'banned'){
                  header('Location: home.php');
                  } else{
                  header('Location: banned.php');
                  }

              }
          }
      }
  }
  ?>

<form method="post" class="form" id="login">
    <small id="red"><?php if(isset($errors['invalid'])) echo $errors['invalid']; echo '</br>' ?></small>
    <label for="name">Username<small id="red"> <?php if(isset($errors['username'])) echo $errors['username']; echo '</br>' ?> </small></label>
        <input type="text" name="username" placeholder="Your Username">
    <label for="email">Password<small id="red"> <?php if(isset($errors['password'])) echo $errors['password']; echo '</br>'?> </small></label>
        <input type="password" name="password" placeholder="Your Password">
    <input type="submit" value="Submit" />
</form>


<?php include 'footer.php'; ?>
