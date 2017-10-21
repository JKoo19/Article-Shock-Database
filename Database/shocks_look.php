<?php
if (!empty($_POST) && !empty($_POST['key']))
{
	include('connection.php');
	$key = "%{$_POST['key']}%";
}
else{
	$message = "Unable to complete empty search.";
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

table{
  border-collapse:collapse;
  border: 2px solid black;
  background-color: #FEFEFE;
  margin-left:20px;
  margin: 0px auto;
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
<h2>Shocks Results</h2>
<div class="links">
<a href="index.php">Authors</a>
<a href="paper_char.php">Paper Characteristics</a>
Shocks
<a href="paper_author.php">Papers and Authors</a>
<a href="paper_shock.php">Papers and Shocks</a>

</div>

<div class="link">
<form action="shocks.php"> <!--Back Button -->
    <input type="submit" value="Back to Table" />
	</form>
<form method="post" action="shocks_look.php"> <!--Form to search table -->
		<label>Search: <input type="text" name="key"/></label>
	<input type="submit" value="Search" />
	</form>
	<?php
	if(!empty($message))
	{
		echo $message;
	}
?>
</div>
<?php
if(empty($message)){
$sqlquery = "SELECT * FROM shocks WHERE (`Shock ID` LIKE :key1) OR 
										(`Shock Type` LIKE :key2) OR 
										(`Description` LIKE :key3) OR 
										(`Date(s) Announced` LIKE :key4) OR 
										(`Date(s) Effective` LIKE :key5) OR 
										(`Country` LIKE :key6) OR 
										(`Applies to which firms` LIKE :key7) OR
										(`Affects` LIKE :key8) OR
										(`Useful for what causal link` LIKE :key9) OR
										(`Methods Used` LIKE :key10) OR
										(`Other Potentially Applicable Methods` LIKE :key11)";
$newquery = $handler->prepare($sqlquery);
$newquery->bindParam('key1', $key);
$newquery->bindParam('key2', $key);
$newquery->bindParam('key3', $key);
$newquery->bindParam('key4', $key);
$newquery->bindParam('key5', $key);
$newquery->bindParam('key6', $key);
$newquery->bindParam('key7', $key);
$newquery->bindParam('key8', $key);
$newquery->bindParam('key9', $key);
$newquery->bindParam('key10', $key);
$newquery->bindParam('key11', $key);
$newquery->execute();

echo "<table>";
echo "<tr><th>Shock ID</th>
	<th style='padding-right:30px';>Shock Type</th>
	<th style='padding-right:10px'>Description</th>
	<th style='padding-right:30px'>Date(s) Announced</th>
	<th style='padding-right:30px'>Date(s) Effective</th>
	<th style='padding-right:30px'>Country</th>
	<th style='padding-right:30px'>Applies to which Firms?</th>
	<th style='padding-right:30px'>Affects</th>
	<th style='padding-right:10px'>Useful for what Causal Link</th>
	<th style='padding-right:30px'>Methods Used</th>
	<th style='padding-right:30px'>Other Potentially Applicable Methods</th></tr>";

while($r = $newquery->fetch(PDO::FETCH_ASSOC))
{
  echo "<tr><td>";
  echo $r['Shock ID'];
  echo "</td><td>";
  echo $r["Shock Type"];
  echo "</td><td>";
  echo $r["Description"];
  echo "</td><td>";
  echo $r["Date(s) Announced"];
  echo "</td><td>";
  echo $r["Date(s) Effective"];
  echo "</td><td>";
  echo $r["Country"];
  echo "</td><td>";
  echo $r["Applies to which firms"];
  echo "</td><td>";
  echo $r["Affects"];
  echo "</td><td>";
  echo $r["Useful for what causal link"];
  echo "</td><td>";
  echo $r["Methods Used"];
  echo "</td><td>";
  echo $r["Other Potentially Applicable Methods"];
  echo "</td></tr>";
}

echo "</table>";
}
?>


</html>
