<?php include 'connect.php';
include 'login.php';
include 'header.php';

if($_POST)
{
    //assigns the post values to a variable for ease of use
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $tutor = $_POST['tutor'];
    $username = $_SESSION['username'];

        //checks for length and other validation errors in the form
        $errors = array();
        if(strlen($comment) < 10)
        {
            $errors['comment'] = " (Comment must be at least 10 characters)";
        }
        //if there are no errors it will perform the query
        if(count($errors) == 0){
          $sql = "SELECT userID FROM Users WHERE username = '$username'";
          $userID = mysqli_query($connection, $sql);
          $row = mysqli_fetch_assoc($userID);
          $user = $row['userID'];
          $sql = "INSERT INTO Reviews(rating, comment, FK_userReviewID, FK_tutorReviewID) VALUES ('$rating', '$comment', '$user', '$tutor')";
          $result = mysqli_query($connection, $sql);
             ##If theres an error, it will echo, or else it will send you back to where your comment was
             if (!$result) {
                     echo 'Error' . mysql_error();
            }
        }
  }

$sql = "SELECT ROUND(avg(rating), 2) AS ratingAverage FROM Reviews WHERE fk_tutorReviewID='1';";
$result = mysqli_query($connection, $sql);
$david = mysqli_fetch_assoc($result);
$sql = "SELECT ROUND(avg(rating), 2) AS ratingAverage FROM Reviews WHERE fk_tutorReviewID='2';";
$result = mysqli_query($connection, $sql);
$peter = mysqli_fetch_assoc($result);
$sql = "SELECT ROUND(avg(rating), 2) AS ratingAverage FROM Reviews WHERE fk_tutorReviewID='3';";
$result = mysqli_query($connection, $sql);
$jp = mysqli_fetch_assoc($result);
?>

    <section class="tutors">
        <section class="tutorsleft">
            <article>
                <a href=""><img id="tutorpic" src="img/davidmai.png"></a>
                <a href=""><h3 class="title">David Mai</h3></a>
                <p class="tutortitle"> Web Development Specialist </p>
                <p class="tutorrating"> (<?php echo $david['ratingAverage'];?> Rating)</p>
                <p class="tutortext"> Graduated from the University of Pittsburgh with honors. Has consulted for big tech companies such as Google, Amazon, and Yahoo in Front-End and Back-End technologies. Proficient in HTML, CSS, PHP, Javascript, Java, Python, MySQL. Worked building websites from the ground up starting from blueprint to final product. </p>
            </article>
        </section>

        <section class="tutorsmiddle">
            <article>
                <a href=""><img id="tutorpic" src="img/petercao.jpg"></a>
                <a href=""><h3 class="title">Peter Cao</h3></a>
                <p class="tutortitle"> Programming Specialist </p>
                <p class="tutorrating"> (<?php echo $peter['ratingAverage'];?> Rating)</p>
                <p class="tutortext"> Working on his degree in Computer Science at the University of Maryland. Proficient in object oriented languages such as Python, Java, C++, Visual Basic, and Ruby. Has worked for big tech companies in the past such as Google, Amazon, and Yahoo as a lead developer. Leading groups of developers, he has learned how to be a mentor and teacher to hundreds of the brightest minds in Pittsburgh.</p>
            </article>
        </section>

        <section class="tutorsright">
            <article>
                <a href=""><img id="tutorpic" src="img/jppeterson.png"></a>
                <a href=""><h3 class="title">JP Peterson</h3></a>
                <p class="tutortitle"> Biology Specialist </p>
                <p class="tutorrating"> (<?php echo $jp['ratingAverage'];?> Rating)</p>
                <p class="tutortext"> Graduated from the University of Maryland with honors. Recieved a bachelor's degree in physiology and neurobiology, and is a graduate from the university's Life Sciences Scholar program. Worked as a research assistant at the FDA within the Center for Devices and Radiological Health. Currently pursuing a graduate degree in the field of Dentistry. </p>
            </article>
        </section>
        <?php
        if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true){
        echo '<button onclick="showReviews()" class="button">Click To Add Review</button>';
      } else {
        echo '<button onclick="" class="button">Must be signed in to review</button>';
      }
        ?>
    </section>

<div id="recentReviews" style="display: none">
    <section class="ratings">
        <article>
            <h3>Recent Reviews</h3>
            <?php
            $sql1= "SELECT r.rating, r.comment, user.school, user.fname as userfname, user.lname as userlname, tutor.fname as tutorfname, tutor.lname as tutorlname
            FROM Reviews as r
            INNER JOIN Users AS user
			          ON r.FK_userReviewID=user.UserID
			      INNER JOIN Users AS tutor
			          ON r.fk_tutorReviewID=tutor.UserID
            ORDER BY reviewID DESC LIMIT 2;";
            $result = mysqli_query($connection, $sql1);

            while($row = mysqli_fetch_assoc($result)){
              echo '<p class ="rv1">' . $row['tutorfname'] . ' ' . $row['tutorlname'] . ', (' . $row['rating'] . ' Stars)</p>
              <p class ="rv2"> "' . $row['comment'] . '"</p>
              <p class ="rv3">-' . $row['userfname'] . ', ' . $row['school'] . '</p>';
            } ?>
        </article>
        <form method="post">
          <label for="tutor">Tutor</label>
          <select name="tutor">
                <option value="1"> David Mai </option>
                <option value="2"> Peter Cao</option>
                <option value="3"> JP Peterson</option>
          </select>
        <label for="rating">Rating</label>
        <select name="rating">
              <option value="1"> 1 Star </option>
              <option value="2"> 2 Stars </option>
              <option value="3"> 3 Stars </option>
              <option value="4"> 4 Stars </option>
              <option value="5"> 5 Stars </option>
        </select>
        <label for="comment">Comment <small id="red"> <?php if(isset($errors['comment'])) echo $errors['comment']; echo '</br>'?> </small></label>
        <textarea name="comment" placeholder="Your Review" rows="15"> </textarea> <br>
        <input type="submit" value="Submit" />
      </form>
    </section>
  </div>


<?php include 'footer.php'; ?>
