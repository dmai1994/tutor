<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pittsburgh Tutor</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto+Slab|Julius+Sans+One" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
    <script src="js/javascript.js"></script>
</head>

<body>

    <header>
        <img id="logo" width="120px" height="120px" src="img/logo.png">
        <h2><a href="home.php" id="headertitle">Pittsburgh Tutor</a></h2>
        <nav>
            <ul>
                <?php if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true){
                        $username = $_SESSION['username'];
                        $sql = "SELECT status, userID FROM Users WHERE username = '$username'";
                        $status = mysqli_query($connection, $sql);
                        $row = mysqli_fetch_assoc($status);
                        $status = $row['status'];
                        $userID = $row['userID'];

                        $sql2 = "SELECT COUNT(currentStatus) AS statusCount FROM Requests WHERE currentStatus='Undecided' AND FK_tutorID='$userID'";
                        $result = mysqli_query($connection, $sql2);
                        $statusCount = mysqli_fetch_assoc($result);

                  if($status=='tutor'){
                        echo '<li><a href="home.php">Home</a></li>
                        <li><a href="tutors.php">Tutors</a></li>
                        <li><a href="schedule.php">Schedule (<strong id="red">' . $statusCount['statusCount'] . '</strong>)</a></li>
                        <li><a href="ban.php">Ban</a></li>
                        <li><a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a></li>';
                  }
                  elseif($status=='user'){
                        echo '<li><a href="home.php">Home</a></li>
                        <li><a href="tutors.php">Tutors</a></li>
                        <li><a href="request.php">Request</a></li>
                        <li><a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a></li>';
                  }
                  elseif($status=='banned'){
                        echo '<li><a href="home.php">Home</a></li>
                        <li><a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a></li>';
                  }
                }
                else {
                        echo '<li><a href="home.php">Home</a></li>
                        <li><a href="tutors.php">Tutors</a></li>
                        <li><a href="pricing.php">Pricing</a></li>
                        <li><a href="loginpage.php">Log In</a></li>';
                  }?>
            </ul>
        </nav>
    </header>
