<!DOCTYPE html>
<html>
<head>
    <title>Edit Quiz Detail</title>
    <link rel="stylesheet" href="css/EditQuiz.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<div class="container p-5">
<img src="MainPics/t11.png" alt="QuizMaster Pro Logo" style="vertical-align: middle; max-height: 300px; margin-top: 20px;">
    <?php
    include_once "./config/mysql_connect.php";
    if (isset($_POST['q_id'])) {
        $ID = $_POST['q_id'];
        $qry = mysqli_query($conn, "SELECT * FROM quiz WHERE q_id='$ID'");
        $numberOfRow = mysqli_num_rows($qry);
        if ($numberOfRow > 0) {
            while ($row1 = mysqli_fetch_array($qry)) {
                $quizID = $row1["q_id"];
    ?>
            <form method="post" action="../controller/updQuiz.php" enctype='multipart/form-data'>
                <!-- Hidden ID Field -->
                <div class="form-group">
                    <input type="hidden" class="form-control" name="q_id" value="<?= $row1['q_id'] ?>" >
                </div>
                <!-- Quiz Title -->
                <div class="form-group full-width">
                    <label for="title"><i class="fas fa-book"></i> Quiz Title:</label>
                    <input type="text" class="form-control" name="title" value="<?= $row1['title'] ?>">
                </div>
                <!-- Answer Fields Row -->
                <div class="form-row">
                    <div class="form-group third-width">
                        <label for="correct"><i class="fas fa-check"></i> Correct Answer:</label>
                        <input type="number" class="form-control" name="correct" value="<?= $row1['correct'] ?>">
                    </div>
                    <div class="form-group third-width">
                        <label for="wrong"><i class="fas fa-times"></i> Wrong Answer:</label>
                        <input type="number" class="form-control" name="wrong" value="<?= $row1['wrong'] ?>">
                    </div>
                    <div class="form-group third-width">
                        <label for="total"><i class="fas fa-list-ol"></i> Total Answer:</label>
                        <input type="number" class="form-control" name="total" value="<?= $row1['total'] ?>">
                    </div>
                </div>
                <!-- Time and Tag Fields Row -->
                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="time"><i class="fas fa-clock"></i> Time:</label>
                        <input type="number" class="form-control" name="time" value="<?= $row1['time'] ?>">
                    </div>
                    <div class="form-group half-width">
                        <label for="q_tag"><i class="fas fa-tag"></i> Tag:</label>
                        <input type="text" class="form-control" name="tag" value="<?= $row1['tag'] ?>">
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="form-group full-width">
                <div class="button-group">
                <input type="submit" name="updateQuiz" class="btn btn-primary" value="Update" onclick="return confirmUpdate();">
                    <input type="button" name="cancel" class="btn btn-secondary" value="Cancel" onclick="window.history.back();">
                </div>
            </div>


            </form>

    <?php
            }
        }
    }
    ?>
</div>

<script>
function confirmUpdate() {
    return confirm('Are you sure you want to update the quiz?');
}
</script>


</body>
</html>
