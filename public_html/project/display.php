<?php
/* set the allowed order by columns */
$default_sort = 'iname';

/* if order is not set, or it is not in the allowed
 * list, then set it to a default value. Otherwise, 
 * set it to what was passed in. */
if (!isset ($_GET['order']) ) {
    $order = $default_sort;
} else {
    $order = $_GET['order'];
}

/* connect to db */
$db = mysql_connect("localhost", "derek23", "6tfc%RDX") or die(mysql_error());
mysql_select_db("derek23",$db) or die(mysql_error()); 

/* delete a record specified by $iname */
if (isset ($_GET['id']) ) {
    $id = $_GET['id'];
    $result =mysql_query("DELETE FROM questionnaire WHERE iname=$instructor", $db);
}

/* construct and run our query */
$result = mysql_query("SELECT * FROM questionnaire ORDER BY $order",$db); 


/* make sure data was retrieved */
$numrows = mysql_num_rows($result);

printf("The number of records %d\n", $numrows);
if ($numrows == 0) {
    echo "No data to display!";
    exit;
}

/* now grab the first row and start the table */
$row = mysql_fetch_assoc ($result);

echo "<TABLE border=1>\n";
echo "<TR>\n";
echo "<TD><b>Delete</b></TD>";
foreach ($row as $heading=>$column) {
    /* hyperlink it so that we can order by this column */
    echo "<TD><b>";
    echo "<a href=\"{$_SERVER['PHP_SELF']}?order=$heading\">$heading</a>";
    echo "</b></TD>\n";
}
echo "</TR>\n";

/* reset the $result set back to the first row and 
 * display the data */
mysql_data_seek ($result, 0);

while ($row = mysql_fetch_assoc ($result)) {
    echo "<TR>\n";
    $instructor=$row["iname"];
    echo "<TD><a href=\"{$_SERVER['PHP_SELF']}?iname=$instructor\">Delete</a></TD>\n";
    foreach ($row as $column) {
           echo "<TD>$column</TD>\n";
        }
    echo "</TR>\n";
}
echo "</TABLE>\n";
?>
<body>
<a href="questionnaire1.php">Search Records</a><br>
<a href="questionnaire2.php">Display average for selected instructor</a><br>
<a href="survey.php">Back to the Questionnaire</a><br>
</body>
