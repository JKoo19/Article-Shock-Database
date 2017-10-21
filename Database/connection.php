<?php


try{
	//Format: new PDO("mysql:host=(hostaddress);dbname=(nameofdatabase)","(username)","(password)", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$handler = new PDO("mysql:host=127.0.0.1;dbname=article_shock_collection",
										 "root",
										 "",
										 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //error handling

	
	//error handling
}catch(PDOException $exception)
{
	echo "Caught exception:" . $exception->getMessage();
	die();
}





?>
