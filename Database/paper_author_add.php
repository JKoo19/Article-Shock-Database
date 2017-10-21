<?php
if (!empty($_POST) && !empty($_POST['paper']) && !empty($_POST['author']) && is_numeric($_POST['author']) && is_numeric($_POST['paper']))
{
	include('connection.php');
	
	//Getting values that user submitted
	$paper = $_POST['paper'];
	$author = $_POST['author'];
	$sqlquery = "INSERT INTO papers_and_authors VALUES (DEFAULT, :paper, :author)";
	
	//prepared statement to prevent SQL injections
	$newquery = $handler->prepare($sqlquery);
	$newquery->bindParam('paper', $paper);
	$newquery->bindParam(':author', $author);
	$newquery->execute();
	
	$message = "Entry successfully added.";
}
else{
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
<h2>Adding to Papers and Authors Table</h2>
<div class="links">
<a href="paper_author.php">Back to table</a>

</div>




	<!-- Form to receive user input for adding entry to table -->
    <form method="post" action="paper_author_add.php">
	<input type="hidden" name="submitted" value="true" /> 
	<fieldset>
		<legend>Add to Papers and Authors Table</legend>
		<label>*Paper ID: <input number="text" name="paper" /></label>
		<label>*Author ID: <input number="text" name="author" /></label>
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
