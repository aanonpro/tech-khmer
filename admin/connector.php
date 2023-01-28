<?php
	 $hostname="http://localhost/nisite/";
	$conn = new PDO("mysql:host=localhost:3306;dbname=db_webcoding_lp","root","");
	if(!$conn)
	{
		die("Error: Failed to connect to database!");
	}
?>