<?php
session_start();
include "../config/mysql_connect.php";

if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['re_password'])) 
{
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function validateField($field, $fieldName, $regex = null) {
        if (empty($field)) {
            return "The $fieldName is required";
        } elseif ($regex && !preg_match($regex, $field)) {
            return "The $fieldName should not contain numbers or special characters";
        }
        return "";
    }

    function validateContactNumber($contactNumber) {
        // Check if the contact number is exactly 10 digits long
        if (strlen($contactNumber) != 10) {
            return "The Contact Number must be exactly 10 digits long";
        }
    
        // Check if the contact number starts with '9'
        if (strpos($contactNumber, '9') !== 0) {
            return "The Contact Number must start with '9'";
        }
    
        // Check if the contact number contains only digits
        if (!preg_match('/^[0-9]+$/', $contactNumber)) {
            return "The Contact Number must contain only digits";
        }
    
        return "";
    }
    function validatePassword($password) {
        $errors = [];

        if (strlen($password) < 8) {
            $errors[] = "Password must have more than 8 characters";
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = "Password must contain at least one capital letter";
        }
        if (!preg_match('/[a-z]/', $password)) {
            $errors[] = "Password must contain at least one lowercase letter";
        }
        if (!preg_match('/[0-9]/', $password)) {
            $errors[] = "Password must contain at least one number";
        }
        if (!preg_match('/[\W]/', $password)) {
            $errors[] = "Password must contain at least one special character";
        }
        return $errors;
    }

    
    
    function validateGmail($email) {
        if (empty($email)) {
            return "Email is required";
        } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $email)) {
            return "Email must be a valid Gmail address (example@gmail.com)";
        }
        return "";
    }

    $errors = []; // Array to store error messages
    // Collecting and sanitizing user inputs
    $role = 'user';
    $uname = validate($_POST['uname']);
    $fn = validate($_POST['firstname']);
    $mn = validate($_POST['middlename']);
    $ln = validate($_POST['lastname']);
    $e = validate($_POST['email']);
    $cn = validate($_POST['contactnum']);
    $gen = validate($_POST['gender']);
    $address = validate($_POST['address']);
    $bdate = validate($_POST['birthdate']);
    $course = validate($_POST['course']);
    $yr_lvl = validate($_POST['yr_lvl']);
    $section = validate($_POST['section']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $user_data = 'uname=' . $uname;

    // Validate each field and accumulate errors
    $fnError = validateField($fn, "First Name", '/^[a-zA-Z ]+$/');
    if ($fnError != "") $errors[] = $fnError;

    $lnError = validateField($ln, "Last Name", '/^[a-zA-Z ]+$/');
    if ($lnError != "") $errors[] = $lnError;

    $contactNumberError = validateContactNumber($cn);
    if ($contactNumberError != "") $errors[] = $contactNumberError;

    $emailError = validateGmail($e);
    if ($emailError != "") $errors[] = $emailError;


    // Additional validations
    if (empty($uname)) $errors[] = "UserName is required";
    if (empty($gen)) $errors[] = "Gender is required";
    if (empty($bdate)) $errors[] = "Birthdate is required";
    if (empty($pass)) $errors[] = "Password is required";
    if (empty($re_pass)) $errors[] = "Re Password is required";
    if ($pass !== $re_pass) $errors[] = "The confirmation password does not match";

    if (empty($address)) $errors['address'] = "Address is required";
    if (empty($course)) $errors['course'] = "Course is required";
    if (empty($yr_lvl)) $errors['yr_lvl'] = "Year Level is required";
    if (empty($section)) $errors['section'] = "Section is required";

    // Check if there are any errors
    if (!empty($errors)) {
        $errorString = urlencode(implode('<br>', $errors));
        header("Location: login.php?action=signup&error=$errorString&$user_data");
        exit();
    }

    $sql = "SELECT * FROM user WHERE username='$uname' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("Location: login.php?error=The username is taken try another&$user_data");
        exit();
    } else {
        $sql2 = "INSERT INTO user(role,username,firstname,middlename,lastname,email,gender,address,contactnum,birthdate,course,yr_lvl,section,password) 
        VALUES('$role','$uname', '$fn','$mn', '$ln', '$e', '$gen', '$address','$cn', '$bdate', '$course','$yr_lvl','$section','$pass')";
               
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            $_SESSION['register_success'] = "Your account has been created successfully!";
            header("Location: login.php");
            exit();
        } else {
            header("Location: login.php?error=unknown error occurred&$user_data");
            exit();
        }
    }
} else {
    header("Location: login.php");
    exit();
}

?>