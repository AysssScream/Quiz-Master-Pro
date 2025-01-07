<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/dash.css">
    <img src="./MainPics/h7.png" alt="QuizMaster" style="width: 100%; display: block; margin-left: 20px;">
    <?php
    include "./config/mysql_connect.php";
    ?>
    <div class="row">
        <div class="col-sm-3">
            <div class="card card-users">
                <i class="fa fa-users mb-2"></i>
                <h4>Total Users</h4>
                <?php
                $sql = "SELECT * from user";
                $result = $conn->query($sql);
                $count = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $count = $count + 1;
                    }
                }
                echo $count;
                ?></h5>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card card-quizzes">
                <i class="fas fa-clipboard-list mb-2"></i>
                <h4>Total Quizzes</h4>
                <?php

                $sql = "SELECT * from quiz";
                $result = $conn->query($sql);
                $count = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $count = $count + 1;
                    }
                }
                echo $count;
                ?>
                </h5>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card card-history">
                <i class="fas fa-star mb-2"></i>
                <h4>Total Ranking</h4>
                <?php

                $sql = "SELECT * from rank";
                $result = $conn->query($sql);
                $count = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $count = $count + 1;
                    }
                }
                echo $count;
                ?>
                </h5>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card card-feedback">
                <i class="fas fa-comments mb-2"></i>
                <h4>Total Feedback</h4>
                <?php

                $sql = "SELECT * from feedback";
                $result = $conn->query($sql);
                $count = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $count = $count + 1;
                    }
                }
                echo $count;
                ?>
                </h5>
            </div>
        </div>
    </div>