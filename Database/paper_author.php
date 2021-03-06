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
<h2>Papers and Authors Table</h2>

<div class="links">
<a href="index.php">Authors</a>
<a href="paper_char.php">Paper Characteristics</a>
<a href="shocks.php">Shocks</a>
Papers and Authors
<a href="paper_shock.php">Papers and Shocks</a>
</div>

<div class="link">
<form method="post" action="paper_author_look.php"> <!--Form to search table -->
		<label>Search: <input type="text" name="key"/></label>
	<input type="submit" value="Search" />
	</form>
<form action="paper_author_add.php"> <!--Link to add to table -->
    <input type="submit" value="Add to this table" />
</form>
</div>
<?php
include('connection.php');

$paperauthorquery = $handler->query("SELECT * FROM papers_and_authors");

echo "<table>";
echo "<tr><th>Paper Author Pair</th><th style='padding-right:30px';>Paper ID</th><th style='padding-right:10px'>Author ID</th></tr>";

while($r = $paperauthorquery->fetch(PDO::FETCH_ASSOC))
{
  echo "<tr><td>";
  echo $r['Paper Author Pair'];
  echo "</td><td>";
  echo $r["Paper ID"];
  echo "</td><td>";
  echo $r["Author ID"];
  echo "</td></tr>";
}

echo "</table>";

?>


</html>
