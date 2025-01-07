<?php
session_start();
if (isset($_POST['delete']) && (isset($_POST['q_id']))) {
    include_once "../config/mysql_connect.php";

    $q_id = $_POST['q_id'];

    $result = mysqli_query($conn, "SELECT * FROM questions WHERE q_id='$q_id' ") or die('Error');
    while ($row = mysqli_fetch_array($result)) {
        $qnid = $row['qnid'];
        $r1 = mysqli_query($conn, "DELETE FROM options WHERE qnid='$qnid'") or die('Error');
        $r2 = mysqli_query($conn, "DELETE FROM answer WHERE qnid='$qnid' ") or die('Error');
    }
    $r3 = mysqli_query($conn, "DELETE FROM questions WHERE q_id='$q_id' ") or die('Error');
    $r4 = mysqli_query($conn, "DELETE FROM quiz WHERE q_id='$q_id' ") or die('Error');
    $r4 = mysqli_query($conn, "DELETE FROM history WHERE q_id='$q_id' ") or die('Error');

    if ($r4) {
        $_SESSION['deleteQuiz_success'] = "Deleted Successfully";
        header('Location: ../dash.php?view=manage');
        exit;
    } else {
        echo "Not able to delete";
    }
}
