<?php
	session_start();
	if(!isset($_SESSION['host']))
	{
		header('Location:index.php');
	}
?>