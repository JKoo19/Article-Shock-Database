<?php
if (!empty($_POST) && !empty($_POST['A1']) && !empty($_POST['title']))
{
	include('connection.php');
	
	//Getting values that user submitted
	$A1 = $_POST['A1'];
	$A2 = $_POST['A2'];
	$A3 = $_POST['A3'];
	$A4 = $_POST['A4'];
	$title = $_POST['title'];
	$abbr = $_POST['abbr'];
	$year = $_POST['year'];
	$volume = $_POST['volume'];
	$pages = $_POST['pages'];
	$abstract = $_POST['abstract'];
	$practice = $_POST['practice'];
	$notes = $_POST['notes'];
	$outcome = $_POST['outcome'];
	$shock = $_POST['shock'];
	$did = $_POST['did'];
	$didcont = $_POST['didcont'];
	$didid = $_POST['didid'];
	$dididcont = $_POST['dididcont'];
	$event = $_POST['event'];
	$eventcont = $_POST['eventcont'];
	$eventrev = $_POST['eventrev'];
	$eventdate = $_POST['eventdate'];
	$eventdidid = $_POST['eventdidid'];
	$shockiv = $_POST['shockiv'];
	$rd = $_POST['rd'];
	$ssrndown = $_POST['ssrndown'];
	$ssrncite = $_POST['ssrncite'];
	$web = $_POST['web'];
	
	$sqlquery = "INSERT INTO paper_characteristics VALUES (DEFAULT, 
															:A1, 
															:A2, 
															:A3, 
															:A4, 
															:title, 
															:abbr, 
															:year, 
															:volume, 
															:pages, 
															:abstract, 
															:practice, 
															:notes, 
															:outcome, 
															:shock, 
															:did, 
															:didcont, 
															:didid, 
															:dididcont, 
															:event, 
															:eventcont, 
															:eventrev, 
															:eventdate, 
															:eventdidid, 
															:shockiv,
															:rd, 
															:ssrndown,
															:ssrncite,
															:web)";
	
	//prepared statement to prevent SQL injections-Not necessary but good to have.
	$newquery = $handler->prepare($sqlquery);
	$newquery->bindParam('A1', $A1);
	$newquery->bindParam(':A2', $A2);
	$newquery->bindParam(':A3', $A3);
	$newquery->bindParam(':A4', $A4);
	$newquery->bindParam(':title', $title);
	$newquery->bindParam(':abbr', $abbr);
	$newquery->bindParam(':year', $year);
	$newquery->bindParam(':volume', $volume);
	$newquery->bindParam(':pages', $pages);
	$newquery->bindParam(':abstract', $abstract);
	$newquery->bindParam(':practice', $practice);
	$newquery->bindParam(':notes', $notes);
	$newquery->bindParam(':outcome', $outcome);
	$newquery->bindParam(':shock', $shock);
	$newquery->bindParam(':did', $did);
	$newquery->bindParam(':didcont', $didcont);
	$newquery->bindParam(':didid', $didid);
	$newquery->bindParam(':dididcont', $dididcont);
	$newquery->bindParam(':event', $event);
	$newquery->bindParam(':eventcont', $eventcont);
	$newquery->bindParam(':eventrev', $eventrev);
	$newquery->bindParam(':eventdate', $eventdate);
	$newquery->bindParam(':eventdidid', $eventdidid);
	$newquery->bindParam(':shockiv', $shockiv);
	$newquery->bindParam(':rd', $rd);
	$newquery->bindParam(':ssrndown', $ssrndown);
	$newquery->bindParam(':ssrncite', $ssrncite);
	$newquery->bindParam(':web', $web);
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
<h2>Adding to Paper Characteristics Table</h2>
<div class="links">
<a href="paper_char.php">Back to table</a>

</div>


<div class="thebox">

	<!-- Form to receive user input for adding entry to table -->
    <form method="post" action="paper_char_add.php">
	<input type="hidden" name="submitted" value="true" /> 
	<fieldset>
		<legend>Add to Shocks Table</legend>
		<label class="box">*Author 1 <input type="text" name="A1" maxlength="45"/></label>
		<label class="box">Author 2: <input type="text" name="A2" maxlength="45"/></label>
		<label class="box">Author 3: <input type="text" name="A3" maxlength="45"/></label>
		<label class="box">Author 4: <input type="text" name="A4" maxlength="45"/></label>
		<label class="box">*Title: <input type="text" name="title" maxlength="151"/></label>
		<label class="box">Journal Abbreviation: <input type="text" name="abbr" maxlength="6"/></label>
		<label class="box">Year: <input number="text" name="year" maxlength="11"/></label>
		<label class="box">Volume: <input number="text" name="volume" maxlength="11"/></label>
		<label class="box">Pages: <input type="text" name="pages" maxlength="20"/></label>
		<label class="box">Abstract <input type="text" name="abstract" maxlength="2262"/></label>
		<label class="box">Good Practice Paper: <input type="text" name="practice" maxlength="10"/></label>
		<label class="box">Notes: <input type="text" name="notes" maxlength="703"/></label>
		<label class="box">Outcome Variable: <input type="text" name="outcome" maxlength="97"/></label>
		<label class="box">Shock ID: <input type="text" name="shock" maxlength="6"/></label>
		<label class="box">DiD: <input type="text" name="did" maxlength="11"/></label>
		<label class="box">DiD Continuous: <input type="text" name="didcont" maxlength="11"/></label>
		<label class="box">DiDiD: <input type="text" name="didid" maxlength="11"/></label>
		<label class="box">DiDiD Continuous: <input type="text" name="dididcont" maxlength="11"/></label>
		<label class="box">Event Study: <input type="text" name="event" maxlength="11"/></label>
		<label class="box">Event Study Continuous: <input type="text" name="eventcont" maxlength="11"/></label>
		<label class="box">Event Study with Reversal: <input type="text" name="eventrev" maxlength="11"/></label>
		<label class="box">Event Study with Multiple Dates: <input type="text" name="eventdate" maxlength="11"/></label>
		<label class="box">Event Study with DiDiD: <input type="text" name="eventdidid" maxlength="11"/></label>
		<label class="box">Shock Based IV: <input type="text" name="shockiv" maxlength="11"/></label>
		<label class="box">RD: <input type="text" name="rd" maxlength="11"/></label>
		<label class="box">SSRN Downloads: <input type="text" name="ssrndown" maxlength="11"/></label>
		<label class="box">SSRN Citations: <input type="text" name="ssrncite" maxlength="11"/></label>
		<label class="box">Web of Science Citations: <input type="text" name="web" maxlength="11"/></label>
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
