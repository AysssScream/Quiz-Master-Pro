<?php
session_start();
include_once "config/mysql_connect.php";
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Master</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/style3.css">
</head>

<body>
    <?php
    include "sidebar.php";
    if (isset($_SESSION['deleteAccount_success'])) {
        echo "<script>alert('" . $_SESSION['deleteAccount_success'] . "');</script>";
        unset($_SESSION['deleteAccount_success']);  // Clear the session variable
    }
    if (isset($_SESSION['deleteQuiz_success'])) {
        echo "<script>alert('" . $_SESSION['deleteQuiz_success'] . "');</script>";
        unset($_SESSION['deleteQuiz_success']);  // Clear the session variable
    }
    if (isset($_SESSION['updateAccount_success'])) {
        echo "<script>alert('" . $_SESSION['updateAccount_success'] . "');</script>";
        unset($_SESSION['updateAccount_success']);  // Clear the session variable
    }
    if (isset($_SESSION['updateQuiz_success'])) {
        echo "<script>alert('" . $_SESSION['updateQuiz_success'] . "');</script>";
        unset($_SESSION['updateQuiz_success']);  // Clear the session variable
    }
    if (isset($_SESSION['saveQuizDetails_success'])) {
        echo "<script>alert('" . $_SESSION['saveQuizDetails_success'] . "');</script>";
        unset($_SESSION['saveQuizDetails_success']);  // Clear the session variable
    }
    ?>
    <script type="text/javascript" src="js/script.js"></script>
    <main>
        <div id="main-content" class="container allContent-section py-4">
            <?php
            if (isset($_GET['view']) && $_GET['view'] == 'quiz') {
                include "adminView/viewQuiz.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'account') {
                include "adminView/viewAccounts.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'editAcc') {
                include "adminView/editAcc.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'delAcc') {
                include "controller/delAcc.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'manage') {
                include "adminView/viewManageQuiz.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'editQuiz') {
                include "adminView/editQuiz.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'addQuiz') {
                include "adminView/addQuizDetails.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'addQuiz2') {
                include "adminView/addQuizDetails2.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'saveQuiz2') {
                include "controller/saveQuizDetails2.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'delQuiz') {
                include "controller/delQuiz.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'feedback') {
                include "adminView/viewFeedback.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'ranking') {
                include "adminView/viewRanking.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'searchQuiz') {
                include "controller/searchQuiz.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'searchAcc') {
                include "controller/searchAcc.php";
            } else {
                include "adminView/viewDash.php";
            }
            ?>
        </div>
    </main>
</body>

</html>