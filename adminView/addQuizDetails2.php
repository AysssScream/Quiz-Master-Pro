<!DOCTYPE html>
<html>
<head>
    <title>Edit Quiz Detail</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<div class="white-container">
<img src="MainPics/t12.png" alt="QuizMaster Pro Logo" style="max-height: 250px; margin-top: 0;">
<?php
echo '<h4></h4>
<form enctype="multipart/form-data" action="dash.php?view=saveQuiz2&n=' . @$_GET['n'] . '&q_id=' . @$_GET['q_id'] . '&ch=4" method="post">';
for ($i = 1; $i <= @$_GET['n']; $i++) {
  echo '<b>Question number&nbsp;' . $i . '&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Write question number ' . $i . ' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '1"></label>  
  <div class="col-md-12">
  <input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '2"></label>  
  <div class="col-md-12">
  <input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '3"></label>  
  <div class="col-md-12">
  <input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '4"></label>  
  <div class="col-md-12">
  <input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question ' . $i . '</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />';
}

echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input type="submit" style="margin-left:45%" class="btn btn-primary" name="save" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
?>
</div>

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

.white-container {
    background: linear-gradient(to bottom, #541cbb, #181ab3);
    border-radius: 8px;
    box-shadow: 0px 10px 15px #31087e;
    width: 1200px; 
    max-width: 2000px; 
    max-height: 75vh;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    color: #ffffff;
    font-weight: bold;
    overflow-y: auto; 
}

.form-control {
    width: 1000px;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #000000;
    background: #ffffff; 
    color: #333333b2;
}

.btn-secondary {
    padding: 10px 15px;
    font-size: 1rem;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: white;
    display: block;
    margin: 20px auto;
    height: 50px;
    width: 300px;;
    
}

.question-container {
    background: #fff; 
    padding: 15px;
    width: 500px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.options-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-left: 90px;
    margin-bottom: 10px;
}

.options-container .form-control {
    flex: 1; 
    min-width: calc(50% - 5px); 
}


</style>
</html>
