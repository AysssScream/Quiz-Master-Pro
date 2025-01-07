<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Quizzes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="CSS/udash.css">

    <style>
body {
    font-family: 'Montserrat', sans-serif;
    background: url(MainPics/t17.png) no-repeat center center; 
    background-size: cover;
    margin: 0; 
    padding: 0; 
    overflow-x: hidden; 
}


.challenge-container {
    position: absolute; 
    top: 40%; 
    left: 55%;
    transform: translateX(-50%); 
    z-index: 10;
    background-color: rgba(255, 255, 255, 0.877);
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 80%;
    color: black;
    max-width: 600px;
}


.challenge-button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s;
}

.challenge-button:hover {
    background-color: #0056b3;
}
    </style>
</head>

<body>
    <div class="challenge-container">
        <h2>Ready to take the challenge?</h2>
        <a href="./udash.php?view=Quizzes">
            <button class="challenge-button">Click here to see all the available quizzes</button>
        </a>
    </div>

</body>

</html>
