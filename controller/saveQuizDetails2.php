<?php
if (isset($_POST['save'])) {
    include_once "./config/mysql_connect.php";

    $n = @$_GET['n'];
    $q_id = @$_GET['q_id'];
    $ch = @$_GET['ch'];

    for ($i = 1; $i <= $n; $i++) {

        $qnid = uniqid();
        $qns = $_POST['qns' . $i];

        // Prepare statement for questions
        $stmt = $conn->prepare("INSERT INTO questions VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $q_id, $qnid, $qns, $ch, $i);
        $q3 = $stmt->execute();

        // Options
        $options = [];
        for ($j = 1; $j <= 4; $j++) {
            $options[$j] = [uniqid(), $_POST[$i . $j]];
        }

        // Insert options
        foreach ($options as $key => $value) {
            $stmt = $conn->prepare("INSERT INTO options VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $qnid, $value[1], $value[0]);
            $stmt->execute();
        }

        // Insert answer
        $e = $_POST['ans' . $i];
        $ansid = $options[ord(strtolower($e)) - 96][0]; // Converts 'a', 'b', 'c', 'd' to 1, 2, 3, 4

        $stmt = $conn->prepare("INSERT INTO answer VALUES (?, ?)");
        $stmt->bind_param("ss", $qnid, $ansid);
        $qans = $stmt->execute();

        if ($q3 && $qans) {
            $_SESSION['saveQuizDetails_success'] = "Insert Record Successfully";
        } else {
            $_SESSION['saveQuizDetails_error'] = "Failed to insert record";
        }
    }
    header('Location: ./dash.php?view=manage');
    exit;
}
?>
