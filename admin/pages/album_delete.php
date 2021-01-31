<?php 
define('PATH_BASE', dirname(dirname(__FILE__)));
require(PATH_BASE . "/config/dbconfig.php");


if(isset($_GET['id'])){
	$album->deleteImage($_GET["id"]);
}

header("location:album_holder.php");
?>

