<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="./CSS/Ranking.css">
    <link rel="stylesheet" href="./CSS/Rquiz.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="content-container">
        <div class="table-container">
        <img src="./MainPics/h6.png" alt="QuizMaster" style="width: 100%; display: block; margin: 0 auto;">
            <img src="./MainPics/f11.png" alt="QuizMaster" style="width: 100%; display: block; margin: 0 auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Year Level</th>
                        <th>Section</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <?php
                include "./config/mysql_connect.php";
                $q = mysqli_query($conn, "SELECT * FROM rank ORDER BY score DESC");
                $c = 0;

                while ($row = mysqli_fetch_array($q)) {
                    $username = $row['username'];
                    $s = max(0, $row['score']); // Use max() to ensure score is not less than zero
                    $q12 = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' ") or die('Error231');
                    while ($row = mysqli_fetch_array($q12)) {
                        $name = $row['firstname'] . ', ' . $row['lastname'];
                        $name1 = ucwords($name);
                        $gender = $row['gender'];
                        $yrlvl = $row['yr_lvl'];
                        $section = $row['section'];
                    }
                    $c++;
                    echo '
                        <tr>
                            <td>' . $c . '</td>
                            <td>' . $name1 . '</td>
                            <td>' . $gender . '</td>
                            <td>' . $yrlvl . '</td>
                            <td>' . $section . '</td>
                            <td>' . $s . '</td>
                        </tr>';
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>