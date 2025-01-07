<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Quizzes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/manage.css">
    <div class="content-container">
    <img src="MainPics/h1.png" alt="QuizMaster Pro Logo" style="max-height: 250px; margin-top: 0; width: 1500px;">
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">S.N.</th>
                    <th class="text-center">Quiz Title</th>
                    <th class="text-center">Correct</th>
                    <th class="text-center">Wrong</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Tag</th>
                </tr>
            </thead>
            <?php
            include_once "./config/mysql_connect.php";
            $sql = "SELECT * from quiz";
            $result = $conn->query($sql);
            $count = 1;

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><?= $row[1] ?></td>
                    <td><?= $row[2] ?></td>
                    <td><?= $row[3] ?></td>
                    <td><?= $row[4] ?></td>
                    <td><?= $row[5] ?></td>
                    <td><?= $row[6] ?></td>
                    <?php
                    ?>
                </tr>
            <?php
                $count++;
            }
            ?>
        </table>
    </div>