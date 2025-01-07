<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Quizzes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/vquiz.css">
</head>

<body>
    <div class="content-container">
        <h3>Results</h3>
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">S.N.</th>
                    <th class="text-center">Quiz Title</th>
                    <th class="text-center">Question Solved</th>
                    <th class="text-center">Right</th>
                    <th class="text-center">Wrong</th>
                    <th class="text-center">Score</th>
                </tr>
            </thead>
            <?php
            include "./config/mysql_connect.php";
            $sql = "SELECT * FROM history";
            $result = mysqli_query($conn, $sql);
            $count = 1;

            while ($row = mysqli_fetch_array($result)) {
                $q_id = $row['q_id'];
                $s = $row['score'];
                $w = $row['wrong'];
                $r = $row['correct'];
                $qa = $row['level'];

                // Fetch the first question of each quiz
                $sql = "SELECT title FROM quiz WHERE q_id='$q_id'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $s ?></td>
                        <td><?= $r ?></td>
                        <td><?= $w ?></td>
                        <td><?= $qa ?></td>
                    </tr>
            <?php
                }
                $count++;
            }
            ?>
        </table>
    </div>
</body>

</html>