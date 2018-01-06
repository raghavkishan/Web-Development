<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;
    charset=UTF-8" />
<!-- Sample PHP program that echoes all parameters sent by a form to the server.
Alan Riggins
CS545, Fall 2012
-->

	<title>Processing Form Data</title>
<style type="text/css">
body { background-color: #DDE; }
h1 { text-align: center; }
table { border: solid 2px black; padding: 10px; margin-left: auto; margin-right: auto; }
td { border: solid 1px black; padding: 5px; background-color: white; }
th { background-color: #CCCCCC; padding: 10px; border: solid 2px black; }
</style>
</head>

<body>
    <h1>Parameters Received by the Server</h1>
    <table>
        <tr>
            <th>Field Name</th>
            <th>Value(s)</th>
        </tr>

<?php
if (!empty($_POST)) {
	foreach ($_POST as $key => $value) {
		if (get_magic_quotes_gpc()) 
			$value=stripslashes($value);
		if (is_array($value)) {       		
				print "<tr><td><code>$key</code></td><td>";
				//foreach ($entry as $value) {
                for($i=0; $i < count($value); $i++) {
				print "<i>$value[$i]</i><br />";
				}
				print "</td></tr>";
				} 
		else {
				print "<tr><td><code>$key</code></td><td><i>$value</i></td></tr>\n";
			} 
	} // end foreach
} // end else
else if(!empty($_GET)) {
	foreach ($_GET as $key => $value) {
		if (get_magic_quotes_gpc()) 
			$value=stripslashes($value);
		if (is_array($value)) {       		
				print "<tr><td><code>$key</code></td><td>";
				//foreach ($entry as $value) {
                for($i=0; $i < count($value); $i++) {
				print "<i>$value[$i]</i><br />";
				}
				print "</td></tr>";
				} 
		else {
				print "<tr><td><code>$key</code></td><td><i>$value</i></td></tr>\n";
			} 
	} // end foreach
} // end else
else {
	print "No data was submitted.";
	} 

?>
</table>
<?php
print '<p />';
print "The information on this request is: <br />";
foreach($_SERVER as $key => $value) {
	print "$key  &nbsp;&nbsp; $value";
	print "<br />\n"; 
	}
?>
</body>
</html>