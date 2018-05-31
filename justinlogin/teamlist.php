<?php 

include('nav.php');

$connection = mysql_connect('localhost', 'root', '', 'fightnite'); //The Blank string is the password
mysql_select_db('fightnite');

$query = "SELECT * FROM teams"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<table>"; // start a table tag in the HTML

while ($row = mysql_fetch_array($result)) {   //Creates a loop to loop through results
	echo "string";
	echo "<tr><td>" . $row['id'] . "</td><td>" . $row['teamname'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysql_close();