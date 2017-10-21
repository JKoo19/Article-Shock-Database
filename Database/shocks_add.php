<?php
if (!empty($_POST) && !empty($_POST['shocktype']) && !empty($_POST['description']))
{
	include('connection.php');
	
	//Getting values that user submitted
	$shocktype = $_POST['shocktype'];
	$description = $_POST['description'];
	$datea = $_POST['datea'];
	$datee = $_POST['datee'];
	$country = $_POST['country'];
	$firms = $_POST['firms'];
	$affects = $_POST['affects'];
	$link = $_POST['link'];
	$method = $_POST['method'];
	$other = $_POST['other'];
	$sqlquery = "INSERT INTO shocks VALUES (DEFAULT, :shocktype, :description, :datea, :datee, :country, :firms, :affects, :link, :method, :other)";
	
	//prepared statement to prevent SQL injections-Not necessary but good to have.
	$newquery = $handler->prepare($sqlquery);
	$newquery->bindParam('shocktype', $shocktype);
	$newquery->bindParam(':description', $description);
	$newquery->bindParam(':datea', $datea);
	$newquery->bindParam(':datee', $datee);
	$newquery->bindParam(':country', $country);
	$newquery->bindParam(':firms', $firms);
	$newquery->bindParam(':affects', $affects);
	$newquery->bindParam(':link', $link);
	$newquery->bindParam(':method', $method);
	$newquery->bindParam(':other', $other);
	$newquery->execute();
	
	//Confirmation message... or message in the else statement
	$message = "Entry successfully added.";
}
else{
	//Failure message with if statement to prevent message from showing before submission.
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
.box{
	white-space: nowrap;
	margin: 5px;
}
.thebox{
	line-height: 170%;
}

</style>
</head>
<h1>Papers and Shocks Database</h1>
<h2>Adding to Shocks Table</h2>
<div class="links">
<a href="shocks.php">Back to table</a>

</div>


<div class="thebox">

	<!-- Form to receive user input for adding entry to table -->
    <form method="post" action="shocks_add.php">
	<input type="hidden" name="submitted" value="true" /> 
	<fieldset>
		<legend>Add to Shocks Table</legend>
		<label class="box">*Shock Type: <input type="text" name="shocktype" maxlength="45"/></label>
		<label class="box">*Description: <input type="text" name="description" maxlength="700"/></label>
		<label class="box">Date(s) Announced: <input type="text" name="datea" maxlength="45"/></label>
		<label class="box">Date(s) Effective: <input type="text" name="datee" maxlength="100"/></label>
		<label class="box">Country: <input type="text" name="country" maxlength="45"/></label>
		<label class="box">Applies to which Firms?: <input type="text" name="firms" maxlength="100"/></label>
		<label class="box">Affects: <input type="text" name="affects" maxlength="100"/></label>
		<label class="box">Useful for what Causal Link: <input type="text" name="link" maxlength="200"/></label>
		<label class="box">Methods Used: <input type="text" name="method" maxlength="100"/></label>
		<label class="box">Other Potentially Applicable Methods: <input type="text" name="other" maxlength="100"/></label>
		</fieldset>
		</div>
	<br />
	<input style='margin-left:20px' type="submit" value="Add new entry" />
	</form>
	<?php
	if(!empty($message)){
	echo $message;
	}
	?>





</html>
