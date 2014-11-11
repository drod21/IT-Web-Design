<html><body>
<title>View Questionnaire Records</title>
<HR SIZE="3" WIDTH="75%" COLOR="darkgreen">
<center><font size=6 color=black>View Questionnaire Records</font></center>
<p>
<form action="questionnaire1.php" method="post">
<p>Keyword : <input type="text" name="name"></input></p>
<input type="HIDDEN" name="Message" value="True">
<input type="submit"></input></p>
</form>
<br>
<?php $name = $_REQUEST['name'];
$Message = $_REQUEST['Message'];
if ($Message): ?>
Thank You For Filling Out the Form
<?php
$db = mysql_connect("localhost", "derek23", "6tfc%RDX") or die(mysql_error());
mysql_select_db("derek23",$db) or die(mysql_error());
$result = mysql_query("SELECT * FROM questionnaire WHERE comments LIKE '%$name%'",$db);
echo "<br />";
while($row = mysql_fetch_array($result)){
echo "<br />";
echo "Keyword ". $name. " is found for instructor ".$row['iname'];
 
}
echo "<br />";
endif;?></p>
<a href="survey.php">Back to the Questionnaire</a><br>
<a href="questionnaire2.php">Display average for selected instructor</a><br>
<a href="display.php">Display all records</a><br>
</body>
</html>
