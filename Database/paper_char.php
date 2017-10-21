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

table{
  border-collapse:collapse;
  border: 2px solid black;
  background-color: #FEFEFE;
  margin-left:20px;
  margin-right:20px;
  
}
td, th {
    border: 1px solid #bbb;
    text-align: left;
	vertical-align: top;
    padding: 8px;
}
tr:nth-child(even) {
    background-color: #dddddd;
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
<h2>Paper Characteristics Table</h2>

<div class="links">
<a href="index.php">Authors</a>
Paper Characteristics
<a href="shocks.php">Shocks</a>
<a href="paper_author.php">Papers and Authors</a>
<a href="paper_shock.php">Papers and Shocks</a>
</div>

<div class="link">
<form method="post" action="paper_char_look.php"> <!--Form to search table -->
		<label>Search: <input type="text" name="key"/></label>
	<input type="submit" value="Search" />
	</form>
<form action="paper_char_add.php"> <!--Link to add to table -->
    <input type="submit" value="Add to this table" />
</form>
</div>
<?php
include('connection.php');

$paperquery = $handler->query("SELECT * FROM paper_characteristics");

echo "<table>";
echo "<tr><th>Paper ID</th>
	<th style='padding-right:20px';>Author 1</th>
	<th style='padding-right:20px'>Author 2</th>
	<th style='padding-right:20px'>Author 3</th>
	<th style='padding-right:20px'>Author 4</th>
	<th style='padding-right:20px'>Title</th>
	<th style='padding-right:20px'>Journal Abbreviation</th>
	<th style='padding-right:20px'>Year</th>
	<th style='padding-right:20px'>Volume</th>
	<th style='padding-right:20px'>Pages</th>
	<th style='padding-right:1000px'>Abstract</th>
	<th style='padding-right:20px'>Good Practice Paper</th>
	<th style='padding-right:500px'>Notes</th>
	<th style='padding-right:20px'>Outcome Variable</th>
	<th style='padding-right:20px'>Shock ID</th>
	<th style='padding-right:20px'>DiD</th>
	<th style='padding-right:20px'>DiD Continuous</th>
	<th style='padding-right:20px'>DiDiD</th>
	<th style='padding-right:20px'>DiDiD Continuous</th>
	<th style='padding-right:20px'>Event Study</th>
	<th style='padding-right:20px'>Event Study Continuous</th>
	<th style='padding-right:20px'>Event Study with Reversal</th>
	<th style='padding-right:20px'>Event Study with Multiple Dates</th>
	<th style='padding-right:20px'>Event Study with DiDiD</th>
	<th style='padding-right:20px'>Shock Based IV</th>
	<th style='padding-right:20px'>RD</th>
	<th style='padding-right:20px'>SSRN Downloads</th>
	<th style='padding-right:20px'>SSRN Citations</th>
	<th style='padding-right:20px'>Web of Science Citations</th></tr>";

while($r = $paperquery->fetch(PDO::FETCH_ASSOC))
{
  echo "<tr><td>";
  echo $r['Our_Paper_ID'];
  echo "</td><td>";
  echo $r["Author1"];
  echo "</td><td>";
  echo $r["Author2"];
  echo "</td><td>";
  echo $r["Author3"];
  echo "</td><td>";
  echo $r["Author4"];
  echo "</td><td>";
  echo $r["Title"];
  echo "</td><td>";
  echo $r["Journal_Abbreviation"];
  echo "</td><td>";
  echo $r["Year"];
  echo "</td><td>";
  echo $r["Volume"];
  echo "</td><td>";
  echo $r["Pages"];
  echo "</td><td>";
  echo $r["Abstract"];
  echo "</td><td>";
  echo $r["Good_Practice_Paper"];
  echo "</td><td>";
  echo $r["Notes"];
  echo "</td><td>";
  echo $r["Outcome_Variable"];
  echo "</td><td>";
  echo $r["Shock_ID"];
  echo "</td><td>";
  echo $r["DiD"];
  echo "</td><td>";
  echo $r["DiD_continuous"];
  echo "</td><td>";
  echo $r["DiDiD"];
  echo "</td><td>";
  echo $r["DiDiD_continuous"];
  echo "</td><td>";
  echo $r["Event_Study"];
  echo "</td><td>";
  echo $r["Event_study_continuous"];
  echo "</td><td>";
  echo $r["Event_study_with_reversal"];
  echo "</td><td>";
  echo $r["Event_study_w_multiple_dates"];
  echo "</td><td>";
  echo $r["event_study_with_DiDiD"];
  echo "</td><td>";
  echo $r["Shock_based_IV"];
  echo "</td><td>";
  echo $r["RD"];
  echo "</td><td>";
  echo $r["SSRN_Downloads"];
  echo "</td><td>";
  echo $r["SSRN_Citations"];
  echo "</td><td>";
  echo $r["Web_of_Science_Citations"];
  echo "</td></tr>";
}


echo "</table>";
?>


</html>
