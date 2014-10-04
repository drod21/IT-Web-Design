<p>Please tell us who you are</p> 
<form action="exer4_1.php" method="post"> 
 
<p>Your Name : <input type="text" name="name"></input></p> 
<p>Your Ages : <input type="text" name="age"></input></p> 
<p>Student UID : <input type="text" name="uid"></input></p> 
<p> Assignment 1 : <input type="text" name="assign1"></input></p>
<p> Assignment 2 : <input type="text" name="assign2"></input></p>
<p> Assignment 3 : <input type="text" name="assign3"></input></p>
<p>Mid-Term Exam : <input type="text" name="midterm"></input></p>
<p>Final Exam : <input type ="text" name="final"></input></p>
<p>Your Bestest Color :<select name="color" SIZE=3> 
<option selected> Red 
<option> Blue 
<option> Green 
</select></p> 
<p>
<input type="HIDDEN" name="Message" value="True">
<input type="submit"></input></p> 
</form> 
<br>
<br>
<?php $name = $_REQUEST['name'];
$age = $_REQUEST['age'];
$uid = $_REQUEST['uid'];
$color = $_REQUEST['color'];
$Message = $_REQUEST['Message'];
$assign1 = $_REQUEST['assign1'];
$assign2 = $_REQUEST['assign2'];
$assign3 = $_REQUEST['assign3'];
$midterm = $_REQUEST['midterm'];
$final = $_REQUEST['final'];
$grade = $_REQUEST['grade'];
if ($Message): ?>
Thank You For Filling Out the Form
<?php echo $name; ?>
<p> You are <?php echo $age; ?> Years of Age. </P> 
<p> Your USF UID is <?php echo $uid; ?>.</p> 
<!-- Make sure the grades are 0-100 and not over.
     Cleaner way of doing this is in a loop. -->
<?php if ($assign1 > 100):?>
<p>All assignments are graded 0-100. Please enter correct grade.</p>
<?php endif;?>
<?php if ($assign2 > 100):?>
<p>All assignments are graded 0-100. Please enter correct grade.</p>
<?php endif;?>
<?php if ($assign3 > 100):?>
<p>All assignments are graded 0-100. Please enter correct grade.</p>
<?php endif;?>
<?php if ($midterm > 100):?>
<p>All assignments are graded 0-100. Please enter correct grade.</p>
<?php endif;?>
<?php if ($final > 100):?>
<p>All assignments are graded 0-100. Please enter correct grade.</p>
<?php endif;?>
<!-- Grade Calculation. Adds each assignment grade && weight to $grade
     variable, and calculates. -->
<?php 
$grade=0; 
if ($_POST['assign1'] >= 0 && $_POST['assign1'] <= 100) 
    $grade = $grade + $_POST['assign1'] * 0.10; 
else 
      $grade = $grade + 10;  
if ($_POST['assign2'] >= 0 && ($_POST['assign2'] <= 100)) 
    $grade = $grade + $_POST['assign2'] * 0.10; 
else 
       $grade = $grade + 10;  
if ($_POST['assign3'] >= 0 && ($_POST['assign3'] <= 100)) 
    $grade = $grade + $_POST['assign3'] * 0.10; 
else 
      $grade = $grade + 10;  
if ($_POST['midterm'] >= 0 && ($_POST['midterm'] <= 100)) 
    $grade = $grade + $_POST['midterm'] * 0.30; 
else 
     $grade = $grade + 30;  
if ($_POST['final'] >= 0 && ($_POST['final'] <= 100)) 
    $grade = $grade + $_POST['final'] * 0.40; 
else 
      $grade = $grade + 40; 
?> 
<p>Your final grade is:</p>
<?php echo $grade; ?>
<p>
<p> Your Bestest Color is: <?php echo $color; ?>. 
<?php endif;?></p>
