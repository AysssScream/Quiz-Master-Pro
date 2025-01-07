<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    include "usidebar.php";
    include_once "config/mysql_connect.php";
    ?>

    <main>
        <div id="main-content" class="container allContent-section py-4">
            <?php
            if (isset($_SESSION['updateAccount_success'])) {
                echo "<script>alert('" . $_SESSION['updateAccount_success'] . "');</script>";
                unset($_SESSION['updateAccount_success']);  // Clear the session variable
            }
            if (isset($_GET['view']) && $_GET['view'] == 'Dashboard') {
                include "userView/userDash.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'Quizzes') {
                include "userView/viewQuiz.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'quizStart') {
                include "userView/quizStart.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'checkQuiz') {
                include "controller/checkQuiz.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'quizRestart') {
                include "controller/quizRestart.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'ranking') {
                include "userView/ranking.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'result') {
                include "userView/quizResult.php";
            } else if (!isset($_GET['view']) || $_GET['view'] == 'history') {
                include "userView/quizHistory.php";
            }else if (isset($_GET['view']) && $_GET['view'] == 'editUAcc') {
                include "userView/editUAcc.php"; 
            } else {
                include "";
            }
            ?>
        </div>

    </main>

    <script type="text/javascript" src="js/script.js"></script>

</body>

</html>