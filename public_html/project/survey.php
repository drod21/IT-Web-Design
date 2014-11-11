<html>
<form action="survey.php" method="post">
<head>
<title>Student Questionnaire</title>
</head>
<style>
H3 {
text-align:center;
}
div.first {
border: 1px solid black;
text-align: center;
}
.questions {
    border: 1px solid black;
    padding:40px;
}
.responses {
letter-spacing:5px;
}

.header {
border: 1px solid black;
text-align: center;
background-color:black;
    color:white;
    margin:20px;
}
</style>
<body>
<H3> Instructions for Student Questionnaire</H3>
<br>
<div class="first">
   <p>Course Number</p>
    <input type="text" name="cnum" maxlength="20">
<br>

   <p>Semester</p>
    <select name=semester>
     <option value='' selected>Choose your semester from this list
     <option value=1>Spring 2013
     <option value=2>Fall 2013
     <option value=3>Spring 2014
     <option value=4>Fall 2014
    </select>
<br>

   <p>Course Title</p>
   <input type="text" name="ctitle" maxlength="50"><br>

   <p>Instructor's Name</p>
   <input type="text" name="instructor" maxlength="50"><BR>
</div>
<div class="questions">
<h3 class="header">Questions</h3>
<p>Responses: P=Poor F=Fair G=Good VG=VG E=Excellent</p>
<p class="responses" align="right">P F G VG E </p>
<p>Description of Course objectives and assignments</p>
<div align="right">
<input type="radio" name="objective" value="1">
<input type="radio" name="objective" value="2">
<input type="radio" name="objective" value="3">
<input type="radio" name="objective" value="4">
<input type="radio" name="objective" value="5">
</div>

<p>Communication of Ideas and information</p><br>
<div align="right">
<input type="radio" name="comm" value="1">
<input type="radio" name="comm" value="2">
<input type="radio" name="comm" value="3">
<input type="radio" name="comm" value="4">
<input type="radio" name="comm" value="5">
</div>

<p>Expression of expectations for performance</p><br>
<div align="right">
<input type="radio" name="expr" value="1">
<input type="radio" name="expr" value="2">
<input type="radio" name="expr" value="3">
<input type="radio" name="expr" value="4">
<input type="radio" name="expr" value="5">
</div>

<p>Availability to assist students in or out of class</p><br>
<div align="right">
<input type="radio" name="avail" value="1">
<input type="radio" name="avail" value="2">
<input type="radio" name="avail" value="3">
<input type="radio" name="avail" value="4">
<input type="radio" name="avail" value="5">
</div>

<p>Respect and concern for students</p><br>
<div align="right">
<input type="radio" name="resp" value="1">
<input type="radio" name="resp" value="2">
<input type="radio" name="resp" value="3">
<input type="radio" name="resp" value="4">
<input type="radio" name="resp" value="5">
</div>

<p>Stimulation of interest in course</p>
<div align="right">
<input type="radio" name="interest" value="1">
<input type="radio" name="interest" value="2">
<input type="radio" name="interest" value="3">
<input type="radio" name="interest" value="4">
<input type="radio" name="interest" value="5">
</div>

<p>Facilitation of learning</p><br>
<div align="right">
<input type="radio" name="facil" value="1">
<input type="radio" name="facil" value="2">
<input type="radio" name="facil" value="3">
<input type="radio" name="facil" value="4">
<input type="radio" name="facil" value="5">
</div>

<p>Overall Rating of Instructor</p><br>
<div align="right">
<input type="radio" name="overall" value="1">
<input type="radio" name="overall" value="2">
<input type="radio" name="overall" value="3">
<input type="radio" name="overall" value="4">
<input type="radio" name="overall" value="5">
</div>
</div>

<p>Detailed comments for the course and/or the instructor.</p>
<textarea name="comments" rows="3" cols="70"></textarea><br>

<p>Please check your answers. When you are done, push the button below.</p>
<p><input type='submit' value='Finished'></p>
<H2>Thank You!</H2>
</form>
</body>
<?php $instructor = $_REQUEST['iname'];
$cnum = $_REQUEST['cnum'];
$ctitle = $_REQUEST['ctitle'];
$semester = $_REQUEST['semster'];
$objective = $_REQUEST['objective'];
$comm = $_REQUEST['comm'];
$expr = $_REQUEST['expr'];
$avail = $_REQUEST['avail'];
$resp = $_REQUEST['resp'];
$interest = $_REQUEST['interest'];
$facil = $_REQUEST['facil'];
$overall = $_REQUEST['overall'];
$comments = $_REQUEST['comments'];
if ($comments): ?>
Thank You For Filling Out the Form  <br>
<?php 
$db = mysql_connect("localhost", "derek23", "6tfc%RDX") or die(mysql_error());
mysql_select_db("derek23",$db) or die(mysql_error()); 
mysql_query("INSERT INTO `questionnaire` (`iname`, `cnum`, `ctitle`, `semester`, `objective`, `comm`, `expr`, `avail`, `resp`, `interest`, `facil`, `overall`, `comments`) VALUES ('$instructor', '$cnum', '$ctitle', '$semester','$objective', '$comm', '$expr', '$avail', '$resp', '$interest', '$facil', '$overall' '$comments')",$db);
endif;?>
<?php
$result = mysql_query("SELECT * FROM questionnaire",$db); 
$num_rows=mysql_num_rows($result);
printf("The number of records %d<br>\n", $num_rows);
?>
</html>

