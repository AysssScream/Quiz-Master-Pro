<?php
session_start();
if (isset($_POST['delete']) && (isset($_POST['id']))) {
    include_once "../config/mysql_connect.php";

    $id = $_POST['id'];

    // Step 1: Retrieve the username for the given ID
    $userQuery = "SELECT username FROM user WHERE id='$id'";
    $userResult = mysqli_query($conn, $userQuery);
    if ($userRow = mysqli_fetch_assoc($userResult)) {
        $username = $userRow['username'];

        // Step 2: Delete the user from the user table
        $deleteUserQuery = "DELETE FROM user WHERE id='$id'";
        $deleteUserResult = mysqli_query($conn, $deleteUserQuery);

        if ($deleteUserResult) {
            // Step 3: Delete the user from the rank table
            $deleteRankQuery = "DELETE FROM rank WHERE username='$username'";
            $deleteRankResult = mysqli_query($conn, $deleteRankQuery);

            if ($deleteRankResult) {
                $_SESSION['deleteAccount_success'] = "Deleted Successfully";
                header('Location: ../dash.php?view=account');
                exit;
            } else {
                echo "Not able to delete from rank table";
            }
        } else {
            echo "Not able to delete from user table";
        }
    } else {
        echo "User not found";
    }
}
?>
