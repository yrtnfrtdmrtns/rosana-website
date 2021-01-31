<?php 
define('PATH_BASE', dirname(dirname(__FILE__)));
require(PATH_BASE . "/config/dbconfig.php");


if(isset($_GET['id'])){
	$project->deleteProject($_GET["id"]);
}

header("location:project_holder.php");
?>

