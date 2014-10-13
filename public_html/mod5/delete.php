<html>
<body>
<?php
$db = mysql_connect("localhost", "derek23", "6tfc%RDX") or die(mysql_error());
mysql_select_db("derek23",$db) or die(mysql_error()); 

$id = $_REQUEST['id'];
$submit = $_REQUEST['submit'];
$delete = $_REQUEST['delete'];
echo "$submit";

if ($submit) {

  // here if no ID then adding else we're editing
$first = $_REQUEST['first'];
$last = $_REQUEST['last'];
$address = $_REQUEST['address'];
$position = $_REQUEST['position'];
$age = $_REQUEST['age'];
$gender = $_REQUEST['gender'];
$phone_number = $_REQUEST['phone_number'];
$email = $_REQUEST['email'];
$interests = $_REQUEST['interests'];
$profession = $_REQUEST['profession'];

  if ($id) {

    $sql = "UPDATE guestbook SET first='$first',last='$last',address='$address',position='$position', age='$age',gender='$gender',phone_number='$phone_number',email='$email',interests='$interests',profession='$profession' WHERE id=$id";

  } else {

    $sql = "INSERT INTO guestbook (first,last,address,position,age,gender,phone_number,email,interests,profession) VALUES ('$first','$last','$address','$position','$age','$gender','$phone_number','$email','$interests','$profession')";

  }

  // run SQL against the DB

  $result = mysql_query($sql);

  echo "Record updated/edited!<p>";

} elseif ($delete) {

    // delete a record

    $sql = "DELETE FROM guestbook WHERE id=$id";    

    $result = mysql_query($sql);

    echo "$sql Record deleted!<p>";

} else {

  // this part happens if we don't press submit

  if (!$id) {

    // print the list if there is not editing
     $result = mysql_query("SELECT * FROM guestbook",$db);

    while ($myrow = mysql_fetch_array($result)) {

    printf("<a href=delete.php?id=%s&delete=yes>(DELETE)</a>", $myrow["id"]);      
    printf("<a href=delete.php?id=%s>(UPDATE)</a>", $myrow["id"]);      
    printf(" First name: %s; Last name:  %s; Address: %s;  Position: %s; Age: %s; Gender: %s; Phone number: %s; Email address: %s; Interests: %s; </a> \n<br>", $myrow["first"], $myrow["last"], $myrow["address"], $myrow["position"], $myrow["age"], $myrow["gender"], $myrow["phone_number"], $myrow["email"], $myrow["interests"], $myrow["profession"]);
    }
  }
 ?>
  <P>Add a Record

  <form method="post" action=delete.php>

  <?php

  if ($id) {

    // editing so select a record

    $sql = "SELECT * FROM guestbook WHERE id=$id";
    $result = mysql_query($sql);
    $myrow = mysql_fetch_array($result);

    $id = $myrow["id"];
    $first = $myrow["first"];
    $last = $myrow["last"];
    $address = $myrow["address"];
    $position = $myrow["position"];
    $age = $_REQUEST['age'];
    $gender = $_REQUEST['gender'];
    $phone_number = $_REQUEST['phone_number'];
    $email = $_REQUEST['email'];
    $interests = $_REQUEST['interests'];
    $profession = $_REQUEST['profession'];
    

    // print the id for editing
    ?>
    <input type=hidden name="id" value="<?php echo $id ?>">
    <?php
  }
  ?>

  First name:<input type="Text" name="first" value="<?php echo $first ?>"><br>
  Last name:<input type="Text" name="last" value="<?php echo $last ?>"><br>
  Address:<input type="Text" name="address" value="<?php echo $address ?>"><br>
  Position:<input type="Text" name="position" value="<?php echo $position ?>"><br>
  Age:<input type="Text" name="age" value="<?php echo $age ?>"><br>
  Gender:<input type="Text" name="gender" value="<?php echo $gender ?>"><br>
  Phone Number:<input type="Text" name="phone_number" value="<?php echo $phone_number ?>"><br>
  Email:<input type="Text" name="email" value="<?php echo $email ?>"><br>
  Interests:<input type="Text" name="interests" value="<?php echo $interests ?>"><br>
  Profession:<input type="Text" name="profession" value="<?php echo $profession ?>"><br><br>

  <input type="Submit" name="submit" value="Enter information">

  </form>
<?php
}
?>
</body>
</html>
