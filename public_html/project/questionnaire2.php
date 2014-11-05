<html><body>
<title>View Questionnaire Records</title>
<HR SIZE="3" WIDTH="75%" COLOR="darkgreen">
<center><font size=6 color=black>View Questionnaire Records</font></center>
<p>
<?php
$db = mysql_connect("localhost", "pbao", "1qaz@WSX") or die(mysql_error());
mysql_select_db("sbakan",$db) or die(mysql_error());
$query = "SELECT iname, AVG(objective) AVG(interest) FROM questionnaire GROUP BY iname";
$result = mysql_query($query) or die(mysql_error());
$num_rows=mysql_num_rows($result);?>
<form action="questionnaire2.php" method="post">
<br>
<p>Select an Instructor to see the average scores : <select name="instructor" SIZE=<?php echo $num_rows?>>
<?php while($row = mysql_fetch_array($result)){?>
<option> <?php echo $row['iname']; }?>
</select></p>
<p>
<input type="submit"></input></p>
</form>
<?php
$instrcutor = $_REQUEST['instructor'];
mysql_data_seek ($result, 0); /* reset the pointer back to the beginning */
while($row = mysql_fetch_array($result)){
if ( $instrcutor == $row['iname']) {
echo "The average score of the Course objectives for ". $row['iname']. " is ".$row['AVG(objective)'];
echo "<br />";
echo "The average score of the Course interest for ". $row['iname']. " is ".$row['AVG(interest)'];
echo "<br />";
 
}
}
?>
</body>
</html>
