<html><body>
<?php
$db = mysql_connect("localhost", "derek23", "6tfc%RDX") or die(mysql_error());
mysql_select_db("derek23",$db) or die(mysql_error()); 
$result = mysql_query("SELECT * FROM guestbook",$db); 
$num_rows=mysql_num_rows($result);
printf("The number of records %d<br>\n", $num_rows);
$i=0; while ($i < $num_rows) { 
printf("First Name: %'-20s\n", mysql_result($result,$i,"first"));
printf("; Last Name: %'-20s\n", mysql_result($result,$i,"last")); 
printf("; Address: %'-40s\n", mysql_result($result,$i,"address"));
printf("; Position: %'-20s<br>\n", mysql_result($result,$i,"position"));
printf("; Age: %'-20s<br>\n", mysql_result($result,$i,"age"));
printf("; Gender: %'-20s<br>\n", mysql_result($result,$i,"gender"));
printf("; Phone Number: %'-20s<br>\n", mysql_result($result,$i,"phone_number"));
printf("; Email Address: %'-20s<br>\n", mysql_result($result,$i,"email"));
printf("; Interests: %'-20s<br>\n", mysql_result($result,$i,"interests"));
printf("; Profession: %'-20s<br>\n", mysql_result($result,$i,"profession"));
$i++;
}
?>
</body>
</html>
