<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="CSS/admin.css">


</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="dash.php?view=dashboard"><span class="las la-home"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="dash.php?view=quiz"><span class="las la-question-circle"></span><span>See Quizzes</span></a>
                </li>
                <li>
                    <a href="dash.php?view=account"><span class="las la-user-friends"></span><span>Show Accounts</span></a>
                </li>
                <li>
                    <a href="dash.php?view=manage"><span class="las la-tools"></span><span>Manage Quiz</span></a>
                </li>
                <li">
                    <a href="dash.php?view=ranking"><span class="las la-trophy"></span><span>Ranking</span></a>
                    </li>
            </ul>

            <div class="sidebar-logout">
                <button class="logout-btn" onclick="showModal()">
                    <span class="las la-sign-out-alt"></span><span>Logout</span>
                </button>
            </div>

            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h1>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                    <img src="MainPics/textlogo.png" alt="QuizMaster Pro Logo" style="vertical-align: middle; height: auto; width: auto; max-height: 40px;">
                </label>
                <!-- <span id="header-title">Dashboard</span> --> <!-- This line is commented out -->
            </h1>

            <div class="user-wrapper">
                <div>
                    <div id="user-dropdown" class="user-dropdown">
                        <a href="javascript:void(0);" onclick="showModal()">
                            <span class="las la-sign-out-alt"></span> Sign Out
                        </a>
                    </div>
                </div>
        </header>
    </div>

    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal()">&times;</span>
            <span class="modal-icon">🔒</span>
            <h2>Confirm Logout</h2>
            <p>Are you sure you want to log out?</p>
            <button onclick="logout()">Logout</button>
            <button onclick="closeModal()">Cancel</button>
        </div>
    </div>
    <footer>
        <p>&copy; 2023 QuizMaster Pro. All rights reserved.</p>
    </footer>


</body>

</html>