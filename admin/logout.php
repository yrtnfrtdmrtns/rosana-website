<?php
	define("PATH_BASE", dirname(__FILE__));
	require(PATH_BASE . "/config/dbconfig.php"); 

	if($_SESSION['user_session']!="")
	{
		$user->redirect('/pages/home.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user->logout();
		$user->redirect('index.php');
	}
	if(!isset($_SESSION['user_session']))
	{
		$user->redirect('index.php');
	}