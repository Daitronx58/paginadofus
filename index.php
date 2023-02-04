<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################

require_once('./controllers/connection.php');
require_once('./app/config.php');
$page = htmlentities(@$_GET['page']);
$page = str_replace('../', '', $page);
$page = str_replace(';', '', $page);
$page = str_replace('&', '', $page);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
		<meta charset="utf-8"/>

		<meta name="author" content="Dofus Toxic | Servidor privado de Dofus 2.51"/>	
		<meta name="description" content="Dofus Toxic es el mejor y mas completo servidor privado de Dofus 2.51 en habla hispana.">
		<meta name="image" content="https://dofusdecay.com/img/logo.png">
		<meta name="twitter:" content="">
		<meta name="twitter:" content="">
		<meta property="og:title" content="Dofus Toxic | Servidor Privado" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://dofusdecay.com" />
		<meta property="og:image" content="https://i.imgur.com/YurrC2N.png" />
		<meta property="og:description" content="Dofus Toxic es un servidor privado e hispanohablante de Dofus 2.51" />
  
		<meta name="keywords" content=""/>
		<meta name="Resource-type" content="Document"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="theme-color" content="#29A0E8">

		<link rel="icon" type="image/ico" href="/template/img/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="/template/css/stylesheet.css"/>
		<link rel="stylesheet" type="text/css" href="/template/css/fontawesome.css"/>
		<link rel="stylesheet" type="text/css" href="/template/css/linearicons-free.css"/>
		<link rel="stylesheet" type="text/css" href="/template/css/StackModal.min.css"/>
		<link rel="stylesheet" type="text/css" href="/template/css/StackCustom.min.css"/>

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="/template/js/interface.js"></script>
		<script type="text/javascript" src="/template/js/StackModal.min.js"></script>
</head>

<?php 
require('./include/main.php');
$page = (isset($_GET['page'])) ? htmlspecialchars($_GET['page']) : 'home';
$page_list = array(
'home' => 'views/home.php',
'article' => 'views/article.php',
'register' => 'views/register.php',
'ladders_pvm' => 'views/ladders_pvm.php',
'ladders_pvp' => 'views/ladders_pvp.php',
'ladders_koli1v1' => 'views/ladders_koli1v1.php',
'ladders_koli3v3' => 'views/ladders_koli3v3.php',
'ladders_koli3v3solo' => 'views/ladders_koli3v3solo.php',
'ladders_vote' => 'views/ladders_vote.php',
'ladders_guilde' => 'views/ladders_guilde.php',
'connection' => 'views/connection.php',
'login' => 'views/login.php',
'succes' => 'views/succes.php',
'join' => 'views/join.php',
'donate' => 'views/donate.php',
'account' => 'views/account.php',
);

if (!isset($page_list[$page])) {
require('views/home.php');
} else {
require($page_list[$page]);
}
require('./include/footer.php');
?>