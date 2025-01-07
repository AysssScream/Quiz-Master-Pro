<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Accounts</title>
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
            z-index: 1000;
            /* Ensure it stays above other content */
        }

        @media (max-width: 100px) {
            .top-bar {
                flex-direction: column;
                margin-top: 0;
            }
        }
    </Style>

<body>
    <div class="content-container">
        <div class="container">
        <img src="MainPics/h5.png" alt="QuizMaster Pro Logo" style="max-height: 250px; margin-top: 0; width: 1100px;">
            <div class="top-bar">
                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <form action="dash.php?view=searchQuiz" method="post">
                        <input type="search" name="search" placeholder="Search quizzes...">
                    </form>
                </div>
            </div>
            <?php
            // Include your database connection script
            include_once "./config/mysql_connect.php";

            // Check if the search term is set
            if (isset($_POST['search']) && !empty(trim($_POST['search']))) {
                $searchTerm = mysqli_real_escape_string($conn, $_POST['search']);

                // Prepare a SQL statement to search the quiz title
                $sql = "SELECT * FROM quiz WHERE title LIKE ?";
                $stmt = $conn->prepare($sql);

                // Add wildcards for partial matching and bind the parameter
                $searchTerm = "%" . $searchTerm . "%";
                $stmt->bind_param("s", $searchTerm);

                // Execute the query
                $stmt->execute();
                $result = $stmt->get_result();

                // Start the table
                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Title</th>";
                echo "<th>Correct</th>";
                echo "<th>Wrong</th>";
                echo "<th>Total</th>";
                echo "<th>Time</th>";
                echo "<th>Tag</th>";
                echo "<th>Actions</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                // Check if there are results
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["title"] . "</td>";
                        echo "<td>" . $row["correct"] . "</td>";
                        echo "<td>" . $row["wrong"] . "</td>";
                        echo "<td>" . $row["total"] . "</td>";
                        echo "<td>" . $row["time"] . "</td>";
                        echo "<td>" . $row["tag"] . "</td>";

                        // Edit Quiz Form
                        echo "<td>";
                        echo "<form method='post' action='./dash.php?view=editQuiz' style='display: inline;'>";
                        echo "<input type='hidden' name='q_id' value='" . $row['q_id'] . "'>";
                        echo "<input type='submit' class='btn btn-success' name='edit' value='Edit'>";
                        echo "</form> ";

                        // Delete Quiz Form
                        echo "<form method='post' action='./controller/delQuiz.php' style='display: inline;'>";
                        echo "<input type='hidden' name='q_id' value='" . $row['q_id'] . "'>";
                        echo "<input type='submit' class='btn btn-danger' name='delete' value='Delete' onclick='return confirmDelete();'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No results found</td></tr>";
                }

                // Close the table body and table
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "No search term provided";
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>


</body>

</html>