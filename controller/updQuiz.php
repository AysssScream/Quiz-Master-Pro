<?php
session_start();
if (isset($_POST['updateQuiz'])) {
    include_once "../config/mysql_connect.php";
    $id = $_POST['q_id'];
    $title = $_POST['title'];
    $correct = $_POST['correct'];
    $wrong = $_POST['wrong'];
    $total = $_POST['total'];
    $time = $_POST['time'];
    $q_tag = $_POST['tag'];
    
    $q = mysqli_query($conn, "UPDATE quiz SET title ='$title', correct='$correct',wrong='$wrong',total='$total',time='$time',tag='$q_tag' where q_id='$id'");
   

    if ($q) {
        $_SESSION['updateQuiz_success'] = "Quiz Item Updated!";
        header('Location: ../dash.php?view=manage');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
