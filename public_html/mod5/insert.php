<html>
<body>
<p>Please tell us who you are</p> 
<form action="insert.php" method="post"> 

<p>Your First Name : <input type="text" name="first"></input></p> 
<p>Your Last Name : <input type="text" name="last"></input></p> 
<p>Your address</p>
<p><textarea name="address" rows=3 cols=70></textarea></p> 
<p>Gender : <input type="text" name="gender"></input></p>
<p>Age : <input type="text" name="first"></input></p>
</p>
<p>Your Interests : <input type="text" name="interests"></input></p>
<p>Phone Number : <input type="text" name="phone_number"></input></p>
<p>Your Position :  <input type="text" name="position"></input></p> 
<p>
<input type="HIDDEN" name="message" value="True">
<input type="submit"></input></p> 
</form> 
<br>
<br>
<?php 
$first = $_REQUEST['first'];
$last = $_REQUEST['last'];
$address = $_REQUEST['address'];
$position = $_REQUEST['position'];
$message = $_REQUEST['message'];
$age = $_REQUEST['age_range'];
$gender = $_REQUEST['gender'];
$phone_number = $_REQUEST['phone_number'];
$interests = $_REQUEST['interests'];
if ($Message): ?>
Thank You For Filling Out the Form  
<?php 
$db = mysql_connect("localhost", "derek23", "6tfc%RDX") or die(mysql_error());
mysql_select_db("derek23",$db) or die(mysql_error()); 
mysql_query("INSERT INTO `guestbook` (`id`, `first`, `last`, `address`, `age_range`, `gender`, `phone_number`, `interests`, `position`) VALUES (NULL, '$first', '$last', '$address', '$position', '$age', '$gender', '$phone_number', '$interests')",$db);
endif;?>
