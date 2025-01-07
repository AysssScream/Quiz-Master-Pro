<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Accounts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/Accounts.css">

</head>

<body>
<div class="search-wrapper">
                <span class="las la-search"></span>
                <form action="dash.php?view=searchAcc" method="post">
                    <input type="search" name="search" placeholder="Search accounts...">
                </form>
            </div>
    <div class="container">
    <img src="MainPics/h2.png" alt="QuizMaster Pro Logo" style="max-height: 250px; margin-top: 0; width: 1300px; margin-left: 20px">

        </div>
        <div class="card-container">
            
            <?php
            include_once "./config/mysql_connect.php";
            $sql = "SELECT * FROM user WHERE role != 'admin'";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = ucwords($row['firstname'] . ' ' . $row['middlename'] .' '. $row['lastname']);
            ?>
                    <div class="account-card">
                        <div class="card-content">
                            <span class="card-title">Account #<?= $count ?></span>
                            <p><strong>Role:</strong> <?= $row["role"] ?></p>
                            <p><strong>Username:</strong> <?= $row["username"] ?></p>
                            <p><strong>Name:</strong> <?= $name ?></p>
                            <p><strong>Email:</strong> <?= $row["email"] ?></p>
                            <p><strong>Gender:</strong> <?= $row["gender"] ?></p>
                            <p><strong>Contact Number:</strong> <?= $row["contactnum"] ?></p>
                            <p><strong>Address:</strong> <?= $row["address"] ?></p>
                            <p><strong>Birth Date:</strong> <?= $row["birthdate"] ?></p>
                            <p><strong>Course:</strong> <?= $row["course"] ?></p>
                            <p><strong>Year Level:</strong> <?= $row["yr_lvl"] ?></p>
                            <p><strong>Section:</strong> <?= $row["section"] ?></p>                            <div class="card-actions">
                                <!-- Edit Account Form -->
                                <form method="post" action="dash.php?view=editAcc&id=<?= $row['id'] ?>" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <input type="submit" class="btn btn-success" name="edit" value="Edit">
                                </form>
                                <!-- Delete Account Form -->
                                <form method="post" action="./controller/delAcc.php" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                                </form>
                            </div>
                        </div>
                    </div>

            <?php
                    $count++;
                }
            } else {
                echo "<p>No accounts found.</p>";
            }
            ?>
        </div>
    </div>
</body>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap");

body {
    font-family: 'Montserrat', sans-serif;
    background: url(../MainPics/b1.png) no-repeat center center fixed; 
    background-size: cover;
    display: flex;
    justify-content: center;
    margin: 0;
    height:100vh;
    align-items: center;
}

.container {
    width: 100%; 
    max-width: 1400px;
    margin-top: 400px;
    padding-top: 200px; 
    margin-bottom: 20px;
}

.card-container {
    margin-top: 20px;
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 20px;
}

.account-card {
    border-radius: 20px;
    box-shadow: 0px 10px 15px #31087e;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 2px solid #000000; 
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    width: 400px;
}

.card-content {
    padding: 20px;
    background-color: #f3f0f8;
}

.card-title {
    background-color: #5d3f92;
    color: #fff;
    padding: 20px;
    border-radius: 20px 20px 0 0;
    margin: -20px -20px 20px -20px; 
    text-align: center;
    font-size: 1.5em;
    font-weight: 800;
}

.card-content p {
    margin: 10px 0;
    line-height: 1.6;
    color: #333;
}

.card-actions {
    text-align: center;
    padding-top: 20px;
}

.btn {
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    color: #fff;
    font-size: 14px;
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease; 
    margin: 0 5px;
}

.btn-success {
    background-color: #46a049; 
}

.btn-danger {
    background-color: #e33e33; 
}

.btn:hover {
    transform: translateY(-2px); 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

@media screen and (max-width: 768px) {
    .card-container {
        grid-template-columns: 1fr;
    }
}

.account-card:hover {
    transform: translateY(-5px); 
    box-shadow: 0px 15px 20px rgba(49, 8, 126, 0.5); 
}


.container {
    width: 1500px; 
    max-width: 1400px;
    margin: auto;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow-y: auto;
    max-height: 750px;
    padding: 20px;
}

.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 50px;
}

.account-card {
    background: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    padding: 20px;
    transition: box-shadow 0.3s;
}

.account-card:hover {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.card-title {
    background-color: #5d3f92;
    color: white;
    padding: 10px;
    border-radius: 8px;
    text-align: center;
    font-size: 1.2em;
    margin-bottom: 20px;
}

.card-content p {
    margin-bottom: 10px;
    font-size: 0.95rem;
}

.card-actions {
    text-align: right;
    margin-top: 10px;
}

.btn {
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    color: white;
    font-size: 0.85rem;
    margin: 0 5px;
    transition: background-color 0.3s ease;
}

.btn-success {
    background-color: #28a745;
}

.btn-danger {
    background-color: #dc3545;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-danger:hover {
    background-color: #c82333;
}

@media screen and (max-width: 768px) {
    .card-container {
        grid-template-columns: 1fr;
    }
}

/* Search Wrapper */
.search-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
}

/* Search Form */
.search-wrapper form {
    position: relative;
    width: 100%;
    max-width: 500px; /* Set to your preference */
}

/* Search Input */
.search-wrapper input[type="search"] {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid #e6e6e6; /* Light grey border */
    border-radius: 20px; /* Rounded borders */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    outline: none;
    font-size: 1rem;
    transition: border-color 0.2s ease-in-out;
}

.search-wrapper input[type="search"]::placeholder {
    color: #9e9e9e; /* Placeholder text color */
}

.search-wrapper input[type="search"]:focus {
    border-color: #5d3f92; /* Highlight color when focused */
}

/* Search Button */
.search-btn {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background-color: transparent;
    border: none;
    padding: 0;
    cursor: pointer;
}

/* Search Icon */
.search-btn .las {
    font-size: 1.5rem;
    color: #5d3f92; /* Icon color */
}

/* Hover effect for the icon */
.search-btn:hover .las,
.search-btn:focus .las {
    color: #4b2c82; /* Darker shade when hovered or focused */
}

/* Responsive adjustments */
@media screen and (max-width: 768px) {
    .search-wrapper {
        margin: 1.5rem 0;
    }

    .search-wrapper form {
        max-width: 100%;
    }
}

.search-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px 0;
    padding: 0 15px;
    height: 100px;
}

.search-box {
    display: flex;
    align-items: center;
    background-color: #fff;
    border-radius: 25px;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
    padding: 10px 20px;
}

.search-box input[type='search'] {
    border: none;
    outline: none;
    margin-right: 10px;
    padding: 10px;
    font-size: 16px;
    width: 100%;
}

.search-box button {
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
}

.search-box i {
    font-size: 24px;
    color: #5d3f92;
}



</style>
</html>