<?php
if (!empty($_POST) && !empty($_POST['fname']))
{
	include('connection.php');
	
	//Getting values that user submitted
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$sqlquery = "INSERT INTO authors VALUES (DEFAULT, :fname, :lname, :mname)";
	
	//prepared statement to prevent SQL injections
	$newquery = $handler->prepare($sqlquery);
	$newquery->bindParam('fname', $fname);
	$newquery->bindParam(':lname', $lname);
	$newquery->bindParam(':mname', $mname);
	$newquery->execute();
	
	$message = "Entry successfully added.";
}
else{
	if(isset($_POST['submitted'])){
	$message = "Please fill required fields.";
	}
}
?>


<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<title>
Article Database
</title>
<style>
html, body {
	position: absolute;
    margin:0;
    padding:0;
    min-height:100%;
    min-width:100%;
}
h1{
	background-color: #52DDFF;
	background-width:100%;
	padding-bottom: 10px;
	padding-left:20px;
	margin-top:0px;
	margin-bottom:0px;
	font-family: 'Open Sans', sans-serif;
	color: white;
}
h2{
	background-color: #52DDFF;
	background-width:100%;
	padding-bottom: 0px;
	padding-left:20px;
	margin-top:0px;
	margin-bottom:0px;
	font-family: 'Open Sans', sans-serif;
	color: white;
}

</style>
</head>
<h1>Papers and Shocks Database</h1>
<h2>Adding to Authors Table</h2>
<div class="links">
<a href="index.php">Back to table</a>

</div>




	<!-- Form to receive user input for adding entry to table -->
    <form method="post" action="author_add.php">
	<input type="hidden" name="submitted" value="true" /> 
	<fieldset>
		<legend>Add to Author Table</legend>
		<label>*First Name: <input type="text" name="fname" maxlength="45" /></label>
		<label>Middle Name: <input type="text" name="mname" maxlength="45" /></label>
		<label>Last Name: <input type="text" name="lname" maxlength="45" /></label>
	</fieldset>
	<br />
	<input style='margin-left:20px' type="submit" value="Add new entry" />
	</form>
	<?php
	if(!empty($message)){
	echo $message;
	}
	?>





</html>
