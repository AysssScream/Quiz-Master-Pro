<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMaster Pro</title>

    <link rel="stylesheet" href="CSS/style1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

</head>
<?php
include_once "config/mysql_connect.php";
?>

<body>
    <header>
        <div class="logo-container">
            <img src="MainPics/textlogo.png" alt="QuizMaster Pro Logo">
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#quizzes">History</a></li>
                <li><a href="AboutUs.html">About</a></li>
                <li><a href="#help">Help/FAQ</a></li>
            </ul>
        </nav>


        <?php
        include_once "config/mysql_connect.php";
        session_start();
        if (!(isset($_SESSION['username']))) {
            header("location:index.html");
        } else {
            $uname = $_SESSION['username'];

            include_once 'config/mysql_connect.php';
            echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="home.php?q=1" class="log log1">' . $uname . '</a>&nbsp;|&nbsp;<a href="login/logout.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
        }
        ?>

    </header>
    <div class="container"><!--container start-->
        <div class="row">
            <div class="col-md-12">
                <?php

                ?>
            </div>
        </div>
    </div>
    <!--Timer
                <span id="countdown" class="timer"></span>
                <script>
                    var seconds = 40;

                    function secondPassed() {
                        var minutes = Math.round((seconds - 30) / 60);
                        var remainingSeconds = seconds % 60;
                        if (remainingSeconds < 10) {
                            remainingSeconds = "0" + remainingSeconds;
                        }
                        document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
                        if (seconds == 0) {
                            clearInterval(countdownTimer);
                            document.getElementById('countdown').innerHTML = "Buzz Buzz";
                        } else {
                            seconds--;
                        }
                    }
                    var countdownTimer = setInterval('secondPassed()', 1000);
                </script> -->

    <!--home closed-->

    <footer>
        <p>&copy; 2023 QuizMaster Pro. All rights reserved.</p>
    </footer>
</body>

</html>