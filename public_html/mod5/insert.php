<p>Please tell us who you are</p> 
<form action="insert.php" method="post"> 

<p>Your First Name : <input type="text" name="First"></input></p> 
<p>Your Last Name : <input type="text" name="Last"></input></p> 
<p>Your address</p>
<p><textarea name="Address" rows=3 cols=50></textarea></p> 
<p>Your Position :  <input type="text" name="Position"></input></p> 
<p>Your Age : <input type="text" name="Age"></input></p>
<p>Your Gender : <input type="text" name="Gender"></input></p>
<p>Your Phone Number : <input type="text" name="Phone_Number"></input></p>
<p>Your Email Address : <input type="text" name="Email"></input></p>
<p>Your Interests :</p>
<p><textarea name="Interests" rows=3 cols=70></textarea></p>
<p>Your Profession : <input type="text" name="Profession"></input></p>
<p>
<input type="HIDDEN" name="Message" value="True">
<input type="submit"></input></p> 
</form> 
<br>
<br>
<?php $First = $_REQUEST['First'];
$Last = $_REQUEST['Last'];
$Address = $_REQUEST['Address'];
$Position = $_REQUEST['Position'];
$Age = $_REQUEST['Age'];
$Gender = $_REQUEST['Gender'];
$Phone_Number = $_REQUEST['Phone_Number'];
$Email = $_REQUEST['Email'];
$Interests = $_REQUEST['Interests'];
$Profession = $_REQUEST['Profession'];
$Message = $_REQUEST['Message'];
if ($Message): ?>
Thank You For Filling Out the Form  
<?php 
$db = mysql_connect("localhost", "derek23", "6tfc%RDX") or die(mysql_error());
mysql_select_db("derek23",$db) or die(mysql_error()); 
mysql_query("INSERT INTO `guestbook` (`id`, `first`, `last`, `address`, `position`, `age`, `gender`, `phone_number`, `email`, `interests`, `profession`) VALUES (NULL, '$First', '$Last', '$Address', '$Position', '$Age','$Gender', '$Phone_Number', '$Email', '$Interests', '$Profession')",$db);
endif;?>
