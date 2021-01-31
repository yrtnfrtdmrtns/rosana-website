<?php

session_start();

// Database information
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "root";
$DB_name = "rcfm";

// Try to connect to the database
// 1 - True - Connected to the database
// 2 - False - Not connected to the database
try
{
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo "1";
}
catch(PDOException $e)
{
	echo $e->getMessage();
	// echo "2";
}

require(PATH_BASE . "/classes/user.class.php");
$user = new User($DB_con);

require(PATH_BASE . "/classes/album.class.php");
$album = new Album($DB_con);

require(PATH_BASE . "/classes/project.class.php");
$project = new Project($DB_con);

require(PATH_BASE . "/classes/image.class.php");
$image = new Image($DB_con);
?>