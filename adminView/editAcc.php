<!DOCTYPE html>
<html>
<head>
    <title>Edit Quiz Detail</title>
    <link rel="stylesheet" href="css/EditAcc.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<div class="container">
<div class="container p-5">
<img src="MainPics/t13.png" alt="QuizMaster Pro Logo" style="max-height: 250px; margin-top: 0px;">
    <?php
    include_once "./config/mysql_connect.php";
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $qry = mysqli_query($conn, "SELECT * FROM user where id='$id'");
        $numberOfRow = mysqli_num_rows($qry);
        if ($numberOfRow > 0) {
            while ($row1 = mysqli_fetch_array($qry)) {
                $userID = $row1["id"];
    ?>
                <form method="post" action="./controller/updAcc.php" enctype='multipart/form-data'>
                    <input type="text" class="form-control" name="id" value="<?= $row1['id'] ?>" hidden>
                        <!-- Row 1: Username, Email, Password -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" value="<?= $row1['username'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" value="<?= $row1['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" value="<?= $row1['password'] ?>">
                            </div>
                        </div>

                        <!-- Row 2: First Name, Middle Name, Last Name -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstname">First Name:</label>
                                <input type="text" class="form-control" name="firstname" value="<?= $row1['firstname'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="middlename">Middle Name:</label>
                                <input type="text" class="form-control" name="middlename" value="<?= $row1['middlename'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name:</label>
                                <input type="text" class="form-control" name="lastname" value="<?= $row1['lastname'] ?>">
                            </div>
                        </div>

                        <!-- Row 3: Gender, Birthdate -->
                        <div class="form-row row-gender-birthdate">
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select name="gender" class="form-control">
                                    <option value="<?= $row1['gender'] ?>"><?= $row1['gender'] ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Prefer not to say">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Birth Date:</label>
                                <input type="date" class="form-control" name="birthdate" value="<?= $row1['birthdate'] ?>">
                            </div>
                        </div>

                        <!-- Row 4: Contact Number, Address -->
                        <div class="form-row row-contact-address">
                            <div class="form-group">
                                <label for="contactnum">Contact Number:</label>
                                <input type="number" class="form-control" name="contactnum" value="<?= $row1['contactnum'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" name="address" value="<?= $row1['address'] ?>">
                            </div>
                        </div>

                        <!-- Row 5: Course, Year Level, Section -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="course">Course:</label>
                                <input type="text" class="form-control" name="course" value="<?= $row1['course'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="yr_lvl">Year Level:</label>
                                <input type="text" class="form-control" name="yr_lvl" value="<?= $row1['yr_lvl'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="section">Section:</label>
                                <input type="text" class="form-control" name="section" value="<?= $row1['section'] ?>">
                            </div>
                        </div>

                        <div class="form-group button-group">
                                <input type="submit" name="update" class="btn btn-primary" value="Update" onclick="return confirmUpdate()">
                                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
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
            return confirm('Are you sure you want to update?');
        }
        </script>
</body>

<style>
    body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to bottom, #020296, #664dd8, #7879c9, #9496f0, #7a7ae7);
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    overflow: hidden;
}

.container {
    background: linear-gradient(to bottom, #541cbb, #181ab3);
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    max-width: 90%;
    width: 1700px; /* Adjust the width as needed */
    color: #fff;
    padding: 20px;
    margin: auto; /* Centers the container */
    display: flex;
    flex-direction: column;
    overflow-y: auto; /* Enables vertical scrolling if content overflows */
    max-height: calc(82vh - 50px); /* Adjust the max height as needed */

}

.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
    }
    
    .form-group label {
    color: #ffffff;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 5px;
    }
    
    .form-control {
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    color: #333;
    width: 100%;
    margin-bottom: 10px;
    }
    
    .button-group {
    display: flex;
    justify-content: space-between;
    }
    
    .btn-primary, .btn-secondary {
    padding: 15px 30px;
    font-size: 1rem;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    width: 48%; /* Makes both buttons equal width /
    margin: 0; / Adjust margin as needed */
    }
    
    .btn-primary {
    background-color: #4CAF50; /* Primary button color */
    color: #ffffff;
    }
    
    .btn-secondary {
    background-color: #d9534f; /* Secondary button color */
    color: #ffffff;
    }
    
    .button-group {
        flex-direction: column;
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* Adjust the number of columns based on your layout */
        gap: 20px; /* Spacing between columns */
    }
    
    .form-group {
        display: flex;
        flex-direction: column;
    }
    
/* Existing CSS for .form-row */
.form-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* Change this for specific rows */
    gap: 20px;
}

/* New CSS for specific rows */
/* Row 3: Gender, Birthdate */
.row-gender-birthdate {
    grid-template-columns: repeat(2, 1fr); /* Two equal columns */
}

/* Row 4: Contact Number, Address */
.row-contact-address {
    grid-template-columns: repeat(2, 1fr); /* Two equal columns */
}

/* Adjust the width of input fields */
.form-control {
    width: 100%; /* This makes the input take full width of the column */
    /* Add more styling if needed */
}

.button-group {
    display: flex;
    flex-direction: row; /* Change from column to row to align buttons horizontally */
    justify-content: center; /* This will center the buttons in the button group */
}

.btn-primary, .btn-secondary {
    padding: 15px 30px;
    font-size: 1rem;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    margin: 0 5px; 
    height: 50px;
}

</style>
</html>