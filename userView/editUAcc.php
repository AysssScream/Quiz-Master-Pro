<!DOCTYPE html>
<html>
<head>
    <title>Edit Quiz Detail</title>
    <link rel="stylesheet" href="../CSS/EditUAcc.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<div class="container">
<div class="container p-5">
<img src="../MainPics/t13.png" alt="QuizMaster Pro Logo" style="max-height: 250px; margin-top: 10px;">
    <?php
    include_once "./config/mysql_connect.php";
    
    if (isset($_SESSION['id']) && isset($_GET['id'])) {
        $userId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
    ?>
                <form method="post" action="../controller/updUAcc.php" enctype='multipart/form-data'>
                    <input type="text" class="form-control" name="id" value="<?= htmlspecialchars($row['id']) ?>" hidden>

                        <!-- Row 1: Username, Email, Password -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" value="<?= $row['username'] ?>" disabled>
                                <input type="hidden" class="form-control" name="username" value="<?= $row['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" value="<?= $row['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" value="<?= $row['password'] ?>">
                            </div>
                        </div>
            <!-- Row 2: First Name, Middle Name, Last Name -->
            <div class="form-row">
                            <div class="form-group">
                                <label for="firstname">First Name:</label>
                                <input type="text" class="form-control" name="firstname" value="<?= $row['firstname'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="middlename">Middle Name:</label>
                                <input type="text" class="form-control" name="middlename" value="<?= $row['middlename'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name:</label>
                                <input type="text" class="form-control" name="lastname" value="<?= $row['lastname'] ?>">
                            </div>
                        </div>

                        <!-- Row 3: Gender, Birthdate -->
                        <div class="form-row row-gender-birthdate">
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select name="gender" class="form-control">
                                    <option value="<?= $row['gender'] ?>"><?= $row['gender'] ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Prefer not to say">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Birth Date:</label>
                                <input type="date" class="form-control" name="birthdate" value="<?= $row['birthdate'] ?>">
                            </div>
                        </div>

                        <!-- Row 4: Contact Number, Address -->
                        <div class="form-row row-contact-address">
                            <div class="form-group">
                                <label for="contactnum">Contact Number:</label>
                                <input type="number" class="form-control" name="contactnum" value="<?= $row['contactnum'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" name="address" value="<?= $row['address'] ?>">
                            </div>
                        </div>

                        <!-- Row 5: Course, Year Level, Section -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="course">Course:</label>
                                <input type="text" class="form-control" name="course" value="<?= $row['course'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="yr_lvl">Year Level:</label>
                                <input type="text" class="form-control" name="yr_lvl" value="<?= $row['yr_lvl'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="section">Section:</label>
                                <input type="text" class="form-control" name="section" value="<?= $row['section'] ?>">
                            </div>
                        </div>

                        <div class="form-group button-group">
                                <input type="submit" name="update" class="btn btn-primary" value="Update" onclick="return confirmUpdate()">
                                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                            </div>
                    </div>
                </form>
    <?php
        } else {
            echo "No user found.";
        }
        $stmt->close();
    }
        else {
        echo "User not logged in or invalid user ID.";
    }
    ?>
</div>
</div>
</body>
</html>
