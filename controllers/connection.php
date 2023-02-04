<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################

session_start();

require ('./app/database.php');
	try
	{
		$login_db = new PDO('mysql:host='.$login_host.';dbname='.$login_name.';port='.$login_port, $login_user, $login_pass);
		$login_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$login_db->query('SET NAMES utf8');
	
		$game_db = new PDO('mysql:host='.$game_host.';dbname='.$game_name.';port='.$game_port, $game_user, $game_pass);
		$game_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$game_db->query('SET NAMES utf8');
	}
	catch(Exception $e)
	{
		die("MySQL Error connection !");
	}
	
if (isset($_POST['connection']))
{
	require ('./controllers/connect.php');
	create_session_user($login_db, $_POST['formuser'], $_POST['formpass']);
}

if (isset($_GET['action']))
{
	session_destroy();
	header('Location: /succes');
	exit();
}
?>