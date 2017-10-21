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
<h2>Authors Results</h2>
<div class="links">
Authors
<a href="paper_char.php">Paper Characteristics</a>
<a href="shocks.php">Shocks</a>
<a href="paper_author.php">Papers and Authors</a>
<a href="paper_shock.php">Papers and Shocks</a>

</div>

<div class="link">
<form action="index.php"> <!--Back Button -->
    <input type="submit" value="Back to Table" />
	</form>
<form method="post" action="author_look.php"> <!--Form to search table -->
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
$sqlquery = "SELECT * FROM authors WHERE (`Author ID` LIKE :key1) OR (`First Name` LIKE :key2) OR (`Middle Name` LIKE :key3) OR (`Family Name` LIKE :key4)";
$newquery = $handler->prepare($sqlquery);
$newquery->bindParam('key1', $key);
$newquery->bindParam('key2', $key);
$newquery->bindParam('key3', $key);
$newquery->bindParam('key4', $key);
$newquery->execute();
echo "<table>";
echo "<tr><th>Author ID</th><th style='padding-right:30px';>First Name</th><th style='padding-right:10px'>Middle Name</th><th style='padding-right:30px'>Last Name</th></tr>";

//loops through table to fetch each entry and outputs a table on webpage
while($r = $newquery->fetch(PDO::FETCH_ASSOC))
{
  echo "<tr><td>";
  echo $r['Author ID'];
  echo "</td><td>";
  echo $r["First Name"];
  echo "</td><td>";
  echo $r["Middle Name"];
  echo "</td><td>";
  echo $r["Family Name"];
  echo "</td></tr>";
}

echo "</table>";
}
?>


</html>
