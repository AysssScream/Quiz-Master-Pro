<?php
if (!isset($_SESSION)) {
  session_start(); // Start the session
}
if (isset($_SESSION['register_success'])) {
  echo "<script>alert('" . $_SESSION['register_success'] . "');</script>";
  unset($_SESSION['register_success']);  // Clear the session variable
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="User login and registration page." />
  <meta name="keywords" content="login, sign up, user authentication" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="../CSS/login1.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>


  <header class="header">
    <a href="../index.html" class="logo">
      <ion-icon name="trophy"></ion-icon>
	  
      <img src="../MainPics/textlogo.png" alt="QuizMaster Pro Logo" style="vertical-align: middle; height: auto; width: auto; max-height: 36px;"> </a>
    <nav class="nav">
      <a href="../index.html">Home</a>
      <a href="../AboutUs.html">About</a>
      <a href="#">Menu</a>
      <a href="#">Reviews</a>
      <a href="#">Contact</a>
    </nav>
  </header>
  <div class="container">
  <div class="registration-container">
    <div class="forms-container">
      <div class="signin-signup">
		
      <form action="check.php" class="sign-in-form" method="post">
      <img src="../MainPics/q1.png" alt="QuizMaster Pro Logo" style="vertical-align: middle; height: auto; width: auto; max-height: 250px;"> </a>
          
          <label for="uname" class="input-label"><i class="fas fa-user label-icon"></i> Username</label>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="uname" name="uname" placeholder="Username" required>
            </div>
          
            <label for="password" class="input-label"><i class="fas fa-lock label-icon"></i> Password</label>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" placeholder="Password" name="password" required>
            <button type="button" class="toggle-password">
              <i class="fas fa-eye"></i>
            </button>
          </div>
          
          <input type="submit" value="Login" class="btn solid">
		  <?php
			if (isset($_GET['error'])) {
				echo '<br><div style="color: #ff7b7b;">' . ($_GET['error']) . '</div>';
			}
				?>
        </form>
		
        <form action="signcheck.php" class="sign-up-form" method="post">
        <h2 class="title"><i class="fas fa-user-plus"></i> Sign up</h2>

        <!-- First Name Field -->
          <div class="form-row">
            <div class="input-field">
              <i class="fas fa-id-badge"></i>
              <input type="text" name="firstname" placeholder="First Name" required>
            </div>

              <!-- Middle Name Field -->
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="middlename" placeholder="Middle Name">
            </div>

            <!-- Last Name Field -->
            <div class="input-field">
              <i class="fas fa-id-card"></i>
              <input type="text" name="lastname" placeholder=" Last Name" required>
            </div>
          </div>

         <!-- UserName Field -->
          <div class="form-row">
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="uname" placeholder="Username" required>
            </div>
         <!-- Email Field -->
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required>
            </div>
            <!-- Contact Field -->
            <div class="input-field-cn">
              <i class="fas fa-phone"></i>
              <div class="phone-prefix">
                <span class="country-code">+63 </span>
              </div>
              <input type="tel" name="contactnum" placeholder="Contact Number" required>
            </div>
          </div>

          <div class="form-row">
            <!-- Gender Selection -->
            <div class="select-field">
              <i class="fas fa-venus-mars"></i>
              <select name="gender" required>
                <option value="" disabled selected>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

          <div class="input-field">
            <i class="fas fa-home"></i>
            <input type="text" name="address" placeholder="Address" required>
          </div>

            <!-- Birthdate -->
            <div class="input-field">
              <i class="fas fa-calendar-alt"></i>
              <input type="date" name="birthdate" placeholder="Birthdate" required>
            </div>
        </div>

        <div class="form-row">
          <div class="select-field">
            <i class="fas fa-graduation-cap"></i>
            <select name="course" required>
              <option value="" disabled selected>Course</option>
              <option value="BSIT">BSIT</option>
              <option value="BSCsE">BSCsE</option>
              <option value="BCS">BCS</option>
              <option value="BSBA">BSBA</option>
            </select>
          </div>

          <div class="select-field">
              <i class="fas fa-layer-group"></i>
              <select name="yr_lvl" required>
                <option value="" disabled selected>Year Level</option>
                <option value="1st year">1st Year</option>
                <option value="2nd year">2nd Year</option>
                <option value="3rd year">3rd Year</option>
                <option value="4th year">4th Year</option>
              </select>
            </div>
            <div class="input-field">
            <i class="fas fa-chalkboard-teacher"></i>
            <input type="text" name="section" placeholder="Section" required>
          </div>
        </div>
        
        <div class="form-row">
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" id="password-signup" required>
            <button type="button" class="toggle-password">
              <i class="fas fa-eye" aria-hidden="true"></i>
            </button>
          </div>
          <!-- Confirm Password Field -->
          <div class="input-field">
            <i class="fas fa-key"></i>
            <input type="password" name="re_password" placeholder="Confirm Password" id="confirm-password" required>
            <button type="button" class="toggle-password">
              <i class="fas fa-eye" aria-hidden="true"></i>
            </button>

          </div>
      </div>
          

          <div class="form-row terms-checkbox-container">
            <label class="checkbox-container">
              <input type="checkbox" required>
              <span style="color: white;">I agree to the <a href="#" style="color: white;" onclick="event.preventDefault();">Terms & Conditions</a></span>
            </label>
          </div>
          <input type="submit" name="signup" class="btn" value="Sign up" />
		  <?php
		  	if (isset($_GET['error'])) {
				echo '<br><div style="color: #ff7b7b;">' . ($_GET['error']) . '</div>';
			}
				?>
        </form>
      </div>
    </div>


    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Ready to Master PHP?</h3>
          <p>New here? Sign up now and dive into PHP-focused quizzes designed to sharpen your skills!</p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="../MainPics/l1.png" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us?</h3>
          <p>
            Log in to continue honing your skills with our challenging quizzes!
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="../MainPics/l2.png" class="image" alt="" />
      </div>
    </div>
  </div>


  <footer>
    <p>&copy; 2023 QuizMaster Pro. All rights reserved.</p>
  </footer>

  </section>

  <div id="termsModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2><i class="fas fa-gavel"></i> Terms and Conditions for QuizMaster Pro</h2>
    </div>
    <div class="modal-body">
    <img src="../MainPics/t1.png" alt="QuizMaster" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
        <p>Welcome to QuizMaster Pro. These Terms and Conditions govern your use of the QuizMaster Pro online quiz platform and provide information about the QuizMaster Pro service.</p>
        <br>

        <h2><i class="fas fa-user-check"></i> Acceptance of Terms</h2>
        <p>By accessing and using the QuizMaster Pro website and services, you agree to be bound by these Terms and Conditions and our Privacy Policy. If you do not agree to these terms, please do not use our services.</p>
        <br>

        <h2><i class="fas fa-user-shield"></i> Registration and Account Security</h2>
        <p>To use QuizMaster Pro, you must register for an account by providing accurate, current, and complete information. You are responsible for maintaining the confidentiality of your account and password and for restricting access to your computer or device. </p>
        <br>

        <h2><i class="fas fa-balance-scale"></i> User Conduct and Responsibilities</h2>
        <p>You agree to use QuizMaster Pro only for lawful purposes. You are responsible for all activities under your account and for ensuring that all use of your account complies with these Terms and Conditions. </p>
        <br>

        <h2><i class="fas fa-book"></i> Intellectual Property Rights</h2>
        <p>The content on QuizMaster Pro, including text, graphics, logos, and software, is the property of QuizMaster Pro or its licensors and is protected by copyright and other intellectual property laws. </p>
        <br>

        <h2><i class="fas fa-user-secret"></i> Privacy Policy</h2>
        <p>Our Privacy Policy, which is an integral part of these Terms and Conditions, explains how we collect, use, and protect your personal data. By using QuizMaster Pro, you consent to the data practices described in our Privacy Policy. </p>
        <br>

        <h2><i class="fas fa-hand-holding-usd"></i> Limitation of Liability</h2>
        <p>QuizMaster Pro, its affiliates, and its service providers will not be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your access to or use of our services. </p>
        <br>

        <h2><i class="fas fa-edit"></i> Amendments to Terms</h2>
        <p>QuizMaster Pro reserves the right to modify these Terms and Conditions at any time. All changes will be posted on this page, and your continued use of QuizMaster Pro after such changes have been posted will constitute your agreement to the modified Terms and Conditions. </p>
        <br>

        <h2><i class="fas fa-gavel"></i> Governing Law and Jurisdiction</h2>
        <p>These Terms and Conditions are governed by the laws of the jurisdiction in which QuizMaster Pro operates. Any disputes arising from these terms will be subject to the exclusive jurisdiction of the courts of that jurisdiction. </p>
        <br>
        
        <h2><i class="fas fa-handshake"></i> Acknowledgment</h2>
        <p>By using QuizMaster Pro, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions. </p>
    </div>
    <div class="modal-footer">
      <p>Thank you for choosing QuizMaster Pro.</p>
    </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const togglePasswordButtons = document.querySelectorAll('.toggle-password');

      togglePasswordButtons.forEach(button => {
        button.addEventListener('click', function () {
          const passwordInput = this.previousElementSibling;
          passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
          this.children[0].classList.toggle('fa-eye');
          this.children[0].classList.toggle('fa-eye-slash');
        });
      });

      // Get the query parameter value
      const queryParams = new URLSearchParams(window.location.search);
      const action = queryParams.get('action');

      // Logic to toggle between sign up and sign in
      const container = document.querySelector(".container");
      if (action === 'signup') {
          container.classList.add("sign-up-mode");
      } else {
          container.classList.remove("sign-up-mode");
      }

    });

    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".container");

    sign_up_btn.addEventListener("click", () => {
      container.classList.add("sign-up-mode");
    });

    sign_in_btn.addEventListener("click", () => {
      container.classList.remove("sign-up-mode");
    });

    // Get the modal
      var modal = document.getElementById("termsModal");

      // Get the button that opens the modal
      var termsLink = document.querySelector(".terms-checkbox-container a");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal
      termsLink.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
	document.addEventListener('DOMContentLoaded', function() {

  // Check for error parameter in URL and display message
  const queryParams = new URLSearchParams(window.location.search);
  const error = queryParams.get('error');
  if (error) {
    // Display the error message below the login form
    const errorMessageDiv = document.createElement('div');
    errorMessageDiv.textContent = error;
    errorMessageDiv.style.color = 'white';
    // Assuming you have a login form with an id 'login-form'
    document.getElementById('login-form').appendChild(errorMessageDiv);
  }
});
  </script>
</body>

</html>