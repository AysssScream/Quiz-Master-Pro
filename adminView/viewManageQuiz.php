<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="./CSS/manage.css">

  <style>
    .top-bar {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
      margin-top: 20px;
      margin-bottom: 20px;

    }

    .search-wrapper {
      position: sticky;
      overflow: hidden;
      top: 0;
      background-color: #5D3FD3;
      /* Or any color you prefer */
      z-index: 10;
      /* Ensure it stays above other content */
    }

    @media (max-width: 100px) {
      .top-bar {
        flex-direction: column;
        margin-top: 0;
      }
    }
  </style>
</head>

<body>
  <div class="content-container">
    <div class="container">
    <img src="MainPics/h4.png" alt="QuizMaster Pro Logo" style="max-height: 250px; margin-top: 0; width: 1100px;">
      <div class="top-bar">
        <div class="search-wrapper">
          <span class="las la-search"></span>
          <form action="dash.php?view=searchQuiz" method="post">
            <input type="search" name="search" placeholder="Search quizzes...">
          </form>
        </div>
      </div>
      <table class="table ">
        <thead>
          <tr>
            <th class="text-center">S.N.</th>
            <th class="text-center">Title</th>
            <th class="text-center">Correct</th>
            <th class="text-center">Wrong</th>
            <th class="text-center">Total</th>
            <th class="text-center">Time</th>
            <th class="text-center">Tag</th>
            <th class="text-center" colspan="2">Action</th>
          </tr>
        </thead>
        <?php
        include_once "./config/mysql_connect.php";
        $sql = "SELECT * from quiz";
        $result = $conn->query($sql);
        $count = 1;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <form method="post" action="dash.php?view=editQuiz">
              <input type="hidden" name="q_id" value="<?php echo $row['q_id']; ?>">
              <tr>
                <td><?= $count ?></td>
                <td><?= $row["title"] ?></td>
                <td><?= $row["correct"] ?></td>
                <td><?= $row["wrong"] ?></td>
                <td><?= $row["total"] ?></td>
                <td><?= $row["time"] ?></td>
                <td><?= $row["tag"] ?></td>
                <td><a href="dash.php?view=editQuiz&q_id=" .$q_id><button class="btn btn-success" style="height:40px">Edit</button></a></td>
            </form>
            <form method="post" action="./controller/delQuiz.php">
              <input type="hidden" name="q_id" value="<?php echo $row['q_id']; ?>">
              <td><input type="submit" class="btn btn-danger" name="delete" value="Delete" onclick="return confirmDelete();"></td>
              </tr>
            </form>
        <?php
            $count = $count + 1;
          }
        }
        ?>
      </table>
      <form method="post" action="dash.php?view=addQuiz">
        <div class="text-center">
          <input type="hidden" name="q_id" value="<?php echo $row['q_id']; ?>">
          <a href="dash.php?view=addQuiz"><input type="submit" class="btn btn-secondary" style="height:40px" value="Add Quiz"></a>
        </div>
      </form>
    </div>
    </form>

    <script>
      function confirmDelete() {
        return confirm('Are you sure you want to delete this quiz?');
      }
    </script>
</body>

</html>