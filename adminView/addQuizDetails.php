<!DOCTYPE html>
<html>
<head>
    <title>Edit Quiz Detail</title>
    <link rel="stylesheet" href="css/AddQuiz.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<div class="white-container">
    <img src="MainPics/t12.png" alt="QuizMaster Pro Logo" style="max-height: 250px; margin-top: 0;">

    <form enctype="multipart/form-data" action="./controller/saveQuizDetails.php" method="post">
        <div class="form-group">
            <label for="title"><i class="fas fa-book"></i> Quiz Title:</label>
            <input type="text" class="form-control" name="quizTitle" id="quizTitle" required>
        </div>

        <div class="form-row">
            <div class="form-group half-width">
                <label for="correct"><i class="fas fa-check"></i> Correct:</label>
                <input type="number" class="form-control" name="marksRight" id="marksRight" required min="1">
            </div>
            <div class="form-group half-width">
                <label for="wrong"><i class="fas fa-times"></i> Wrong:</label>
                <input type="number" class="form-control" name="marksWrong" id="marksWrong" required min="1">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group half-width">
                <label for="total"><i class="fas fa-list-ol"></i> Total:</label>
                <input type="number" class="form-control" name="totalQuestions" id="totalQuestions" required min="1">
            </div>

            <div class="form-group half-width">
                <label for="time"><i class="fas fa-clock"></i> Time:</label>
                <input type="number" class="form-control" name="timeLimit" id="timeLimit" required min="1">
            </div>
        </div>

        <div class="form-group">
            <label for="tag"><i class="fas fa-tags"></i> Tag:</label>
            <input type="text" class="form-control" name="tag" id="tag" required>
        </div>
        
        <div class="form-group">
        <div class="form-group button-group">
            <button type="submit" class="btn btn-primary" name="upload"><i class="fas fa-plus-circle"></i> Add Quiz</button>
            <button type="button" class="btn btn-cancel" onclick="history.back();"><i class="fas fa-times-circle"></i> Cancel</button>
        </div>
    </form>
</div>

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

.white-container {
    margin-top: 1000px;
    background: linear-gradient(to bottom, #541cbb, #181ab3);
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    max-width: 90%; 
    width: 1700px; 
    height: 80vh; 
    color: #fff; 
    padding: 20px;
    margin: auto; 
    display: flex;
    flex-direction: column; 
    margin-bottom: 30px;
}

.form-control {
    width: 100%; 
    padding: 10px;
    margin-bottom: 10px; 
    border-radius: 5px;
    border: 1px solid #ccc; 
}

.form-group {
    width: 100%;
}

form {
    width: 100%; 
}

.btn-secondary {
    padding: 15px 30px; 
    font-size: 1rem; 
    cursor: pointer; 
    border: none; 
    border-radius: 5px; 
    width: auto; 
    align-self: center; 
    align-items: center;
    width: 300px;
    height: 50px;
}

.form-row {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap; 
}

.form-group.half-width {
    width: calc(50% - 10px); 
    margin-right: 10px;
}

.form-group.half-width:last-child {
    margin-right: 0;
}

.form-group.full-width {
    width: 100%;
}

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

.white-container {
    background: linear-gradient(to bottom, #541cbb, #181ab3);
    border-radius: 8px;
    box-shadow: 0px 10px 15px #31087e;
    width: 1000px; 
    max-width: 1000px; 
    margin: 2% auto; 
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    color: #fff;
    margin-top: -50px;

}

.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    color: #333;
}


.btn-secondary {
    padding: 10px 15px;
    font-size: 1rem;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    width: auto;
    height: 40px;
    background-color: #4c66af; 
    color: white;
    display: block;
    margin: 20px auto; 
}

.button-group {
    display: flex;
    justify-content: space-between; 
}

.btn-primary, .btn-cancel {
    padding: 10px 15px;
    font-size: 1rem;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    margin: 10px; 
    width: 45%; 
    height: 45%;
}

.btn-primary {
    background-color: #4CAF50; 
    color: white;
}

.btn-cancel {
    background-color: #f44336; 
    color: white;
}

</style>

</body>
</html>
