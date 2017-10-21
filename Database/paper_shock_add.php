<?php
if (!empty($_POST) && !empty($_POST['paper']) && !empty($_POST['shock']) && is_numeric($_POST['shock']) && is_numeric($_POST['paper']))
{
	include('connection.php');
	
	//Getting values that user submitted
	$shock = $_POST['shock'];
	$paper = $_POST['paper'];
	$sqlquery = "INSERT INTO papers_and_shocks VALUES (DEFAULT, :shock, :paper)";
	
	//prepared statement to prevent SQL injections
	$newquery = $handler->prepare($sqlquery);
	$newquery->bindParam('shock', $shock);
	$newquery->bindParam(':paper', $paper);
	$newquery->execute();
	
	//Confirmation message... or message in the else statement
	$message = "Entry successfully added.";
}
else{
	//Failure message with if statement to prevent message from showing before submission.
	if(isset($_POST['submitted'])){
	$message = "Please fill required fields and make sure to use numeric values.";
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
<h2>Adding to Papers and Shocks Table</h2>
<div class="links">
<a href="paper_shock.php">Back to table</a>

</div>




	<!-- Form to receive user input for adding entry to table -->
    <form method="post" action="paper_shock_add.php">
	<input type="hidden" name="submitted" value="true" /> 
	<fieldset>
		<legend>Add to Papers and Shocks Table</legend>
		<label>*Shock ID: <input number="text" name="shock" /></label>
		<label>*Paper ID: <input number="text" name="paper" /></label>
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
