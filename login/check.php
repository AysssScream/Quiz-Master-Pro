<?php

session_start();
include "../config/mysql_connect.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: login.php?error=UserName is required");
        exit();
    } else if (empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        // Check for admin login
        if ($pass === 'admin' && $uname === 'admin') {
            $_SESSION['username'] = 'admin';
            $_SESSION['role'] = 'admin'; // Define admin role or fetch from a configuration
            header("Location: ../dash.php?view=dash.php"); // Redirect to the admin dashboard
            exit();
        } else {

            $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] === $uname && $row['password'] === $pass) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: ../udash.php?view=Dashboard"); // Redirect to the user dashboard
                    exit();
                } else {
                    header("Location: login.php?error=Incorrect Username or password");
                    exit();
                }
            } else {
                header("Location: login.php?error=Incorrect Username or password");
                exit();
            }
        }
    }
} else {
    header("Location: login.php");
    exit();
}
?>
