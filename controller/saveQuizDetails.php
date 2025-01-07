<?php
session_start();
if (isset($_POST['upload'])) {
    include_once "../config/mysql_connect.php";
    $q_id = uniqid();
    $title = $_POST['quizTitle'];
    $total = $_POST['totalQuestions'];
    $correct = $_POST['marksRight'];
    $wrong = $_POST['marksWrong'];
    $time = $_POST['timeLimit'];
    $q_tag = $_POST['tag'];

    // Inserting record
    $query = "INSERT INTO quiz VALUES ('$q_id','$title', '$correct', '$wrong', '$total', '$time', '$q_tag')";
    $result = mysqli_query($conn, $query);
    $qid = mysqli_insert_id($conn); // Get the auto-generated q_id
    mysqli_close($conn);

    if ($result) {
        header('Location: ../dash.php?view=addQuiz2&q_id=' . $q_id . '&n=' . $total . '&ch=4');
        exit;
    } else {
        echo "Not able to insert";
    }
}
