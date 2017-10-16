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
        ORDER BY reviewID;";
        $result = mysqli_query($connection, $sql1);

        while($row = mysqli_fetch_assoc($result)){
          echo '<p class ="rv1">' . $row['tutorfname'] . ' ' . $row['tutorlname'] . ', (' . $row['rating'] . ' Stars)</p>
          <p class ="rv2"> "' . $row['comment'] . '"</p>
          <p class ="rv3">-' . $row['userfname'] . ', ' . $row['school'] . '</p>';
        } ?>
    </article>
