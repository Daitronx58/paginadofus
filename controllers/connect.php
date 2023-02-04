<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################

function create_session_user($db, $username, $password)
{
if (!isset($username) || !isset($password))
	return;
if(!empty($username) && !empty($password))
{
if(!mb_eregi('[^a-zA-Z0-9_]', $username))
{
if(!mb_eregi('[^a-zA-Z0-9_[:punct:]]', $password))
{
$hash = md5($password);
$id = trim($username);
$mdp = trim($hash);

global $login_db;

  $resultats = $login_db->prepare('SELECT * FROM accounts WHERE Login=:login AND PasswordHash=:pass') or die('Une erreur est survenu.');
  $resultats->bindValue(':login', $id, PDO::PARAM_STR);
  $resultats->bindValue(':pass', $mdp, PDO::PARAM_STR);
  $resultats->execute();
  $reponse = $resultats->fetch(PDO::FETCH_ASSOC);

if($reponse == TRUE)
{
    $_SESSION['id'] = $reponse['Id'];
	header('Location: /login');
	exit();
}else 
	header('Location: /login');
}else 
	header('Location: /login');
}else 
	header('Location: /login');
}else 
	header('Location: /login');
}
?>