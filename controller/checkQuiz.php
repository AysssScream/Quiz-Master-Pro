<?php
include_once "../config/mysql_connect.php";
$q_id = @$_GET['q_id'];
$sn = @$_GET['n'];
$total = @$_GET['t'];
$ans = $_POST['ans'];
$qnid = @$_GET['qnid'];
$username = $_SESSION['username'];
$q = mysqli_query($conn, "SELECT * FROM answer WHERE qnid='$qnid' ");

while ($row = mysqli_fetch_array($q)) {
    $ansid = $row['ansid'];
}

if ($ans == $ansid) {
    $q = mysqli_query($conn, "SELECT * FROM quiz WHERE q_id='$q_id' ");

    while ($row = mysqli_fetch_array($q)) {
        $correct = $row['correct'];
    }

    if ($sn == 1) {
        $q = mysqli_query($conn, "INSERT INTO history VALUES('$username','$q_id' ,'0','0','0','0',NOW())") or die('Error');
    }

    $q = mysqli_query($conn, "SELECT * FROM history WHERE q_id='$q_id' AND username='$username' ") or die('Error115');

    while ($row = mysqli_fetch_array($q)) {
        $s = $row['score'];
        $r = $row['correct'];
    }

    $r++;
    $s = $s + $correct;
    $q = mysqli_query($conn, "UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW() WHERE username = '$username' AND q_id = '$q_id'") or die('Error124');
} else {
    $q = mysqli_query($conn, "SELECT * FROM quiz WHERE q_id='$q_id' ") or die('Error129');

    while ($row = mysqli_fetch_array($q)) {
        $wrong = $row['wrong'];
    }

    if ($sn == 1) {
        $q = mysqli_query($conn, "INSERT INTO history VALUES('$username','$q_id' ,'0','0','0','0',NOW() )") or die('Error137');
    }

    $q = mysqli_query($conn, "SELECT * FROM history WHERE q_id='$q_id' AND username='$username' ") or die('Error142');

    while ($row = mysqli_fetch_array($q)) {
        $s = $row['score'];
        $w = $row['wrong'];
    }

    $w++;
    $s = $s - $wrong;
    $q = mysqli_query($conn, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE username = '$username' AND q_id = '$q_id'") or die('Error147');
}
if ($sn != $total) {
    $sn++;
    echo "<script>window.location.href='udash.php?view=quizStart&q_id=$q_id&n=$sn&t=$total';</script>";
} else {
    $q = mysqli_query($conn, "SELECT score FROM history WHERE q_id='$q_id' AND username='$username'") or die('Error156');
    while ($row = mysqli_fetch_array($q)) {
        $s = $row['score'];
    }
    $q = mysqli_query($conn, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
    $rowcount = mysqli_num_rows($q);
    if ($rowcount == 0) {
        $q2 = mysqli_query($conn, "INSERT INTO rank VALUES('$username','$s',NOW())") or die('Error165');
    } else {
        while ($row = mysqli_fetch_array($q)) {
            $sun = $row['score'];
        }
        $sun = $s + $sun;
        $q = mysqli_query($conn, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
    }
    echo "<script>window.location.href='udash.php?view=result&q_id=$q_id';</script>";
}
echo "<script>window.location.href='udash.php?view=result&q_id=$q_id';</script>";
