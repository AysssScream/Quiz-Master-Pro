<?php
session_start();
if (isset($_POST['update'])) {
    include_once "../config/mysql_connect.php";
    $id = $_POST['id'];
    $uname = $_POST['username'];
    $fn = $_POST['firstname'];
    $mn = $_POST['middlename'];
    $ln = $_POST['lastname'];
    $e = $_POST['email'];
    $gen = $_POST['gender'];
    $cn = $_POST['contactnum'];
    $addr = $_POST['address']; 
    $bdate = $_POST['birthdate'];
    $course = $_POST['course']; 
    $yr_lvl = $_POST['yr_lvl']; 
    $section = $_POST['section']; 
    $pw = $_POST['password'];

    // Prepare statement
    $stmt = $conn->prepare("UPDATE user SET username=?, firstname=?, middlename=?, lastname=?, email=?, gender=?, contactnum=?, address=?, birthdate=?, course=?, yr_lvl=?, section=?, password=? WHERE id=?");
    // 13 's' for string and 1 'i' for integer (id)
    $stmt->bind_param("ssssssissssssi", $uname, $fn, $mn, $ln, $e, $gen, $cn, $addr, $bdate, $course, $yr_lvl, $section, $pw, $id);

    if ($stmt->execute()) {
        $_SESSION['updateAccount_success'] = "User Account has been Updated!";
        header('Location: ../udash.php?view=Dashboard');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>