<?php
$username = $_SESSION['username'];
$q_id = @$_GET['q_id'];
$n = @$_GET['n'];
$t = @$_GET['t'];
$q = mysqli_query($conn, "SELECT score FROM history WHERE q_id='$q_id' AND username='$username'") or die('Error156');
while ($row = mysqli_fetch_array($q)) {
    $s = $row['score'];
}
$q = mysqli_query($conn, "DELETE FROM history WHERE q_id='$q_id' AND username='$username' ") or die('Error184');
$q = mysqli_query($conn, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
while ($row = mysqli_fetch_array($q)) {
    $sun = $row['score'];
}
$sun = $sun - $s;
$q = mysqli_query($conn, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
echo "<script>window.location.href='udash.php?view=quizStart&q_id=$q_id&n=1&t=$t';</script>";
