<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Sidebar Dashboard Template</title>
  <link rel="stylesheet" href="CSS/user.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <!-- Ionic Icons -->
  <script src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>

  <?php
  if (!isset($_SESSION)) {
    session_start(); // Start the session
  }

  if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
  } else {
      // Handle the case where the session ID is not set
      echo "User not logged in.";
      exit; // or redirect to a login page
  }
  
  // Check if username is set in the session and assign it to a variable
  $uname = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
  ?>

  <input type="checkbox" id="check">
  <header class="header">
    <div class="header-left">
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
    </div>

    <a href="usidebar.php" class="logo">
      <ion-icon name="trophy"></ion-icon>
      <img src="MainPics/textlogo.png" alt="QuizMaster Pro Logo" style="vertical-align: middle; max-height: 36px; ">
    </a>


    <span id="datetime" class="datetime">
      <i class="fas fa-clock"></i>
      <span id="date-time-text"></span>
    </span>
  </header>

  <div class="sidebar">
    <center>
      <img src="MainPics/profile.png" class="profile_image" alt="">
      <h4><?php echo htmlspecialchars($uname); ?></h4> <!-- Display the username here -->
    </center>
    <a href="udash.php?view=Dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
    <a href="udash.php?view=Quizzes"><i class="fas fa-question-circle"></i><span>Quizzes</span></a>
    <a href="udash.php?view=history"><i class="fas fa-chart-bar"></i><span>History</span></a>
    <a href="udash.php?view=ranking"><i class="fas fa-ranking-star"></i></i><span>Ranking</span></a>
    <a href="udash.php?view=editUAcc&id=<?= $id ?>"><i class="fas fa-user-edit"></i><span>Edit Profile</span></a>
    <a href="#" id="signOutBtn"><i class="fas fa-sign-out-alt"></i><span>Sign Out</span></a>
  </div>

  <div class="content"></div>

  <footer>
    <p>&copy; 2023 QuizMaster Pro. All rights reserved.</p>
  </footer>

  <div id="signOutModal" class="modal">
    <div class="modal-content">

      <div class="modal-header">
        <span class="close">&times;</span>
        <i class="fas fa-sign-out-alt"></i>
        <h2>Exit Confirmation</h2>
      </div>
      <img src="MainPics/s4.png" alt="QuizMaster" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
      <div class="button-container">
        <button id="confirmSignOut">
          <i class="fas fa-check"></i>
          Yes
        </button>
        <button id="cancelSignOut">
          <i class="fas fa-times"></i>
          No
        </button>
      </div>
      <div class="modal-footer">
        <p>Thank you for using QuizMaster!</p>
      </div>
    </div>
  </div>


  <script>
    document.getElementById('signOutBtn').addEventListener('click', function() {
      document.getElementById('signOutModal').style.display = 'block';
    });

    document.getElementsByClassName('close')[0].addEventListener('click', function() {
      document.getElementById('signOutModal').style.display = 'none';
    });

    document.getElementById('cancelSignOut').addEventListener('click', function() {
      document.getElementById('signOutModal').style.display = 'none';
    });

    function updateDateTime() {
      var now = new Date();
      var dateString = now.toLocaleDateString(undefined, {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
      });
      var timeString = now.toLocaleTimeString();
      document.getElementById('date-time-text').textContent = dateString + ' ' + timeString;
    }

    function updateDateTime() {
      var now = new Date();
      var dateString = now.toLocaleDateString(undefined, {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
      });
      var timeString = now.toLocaleTimeString();
      document.getElementById('date-time-text').textContent = dateString + ' ' + timeString;
    }

    setInterval(updateDateTime, 1000); // Update the time every second
    updateDateTime(); // Initialize on page load

    // JavaScript to handle the logout process
    document.getElementById('confirmSignOut').addEventListener('click', function() {
      // Redirect to index.html on click
      window.location.href = 'index.html';
    });
  </script>

</body>

</html>