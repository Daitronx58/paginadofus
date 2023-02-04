<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################

if(isset($_POST['passwordchange']))
{
    $g_id = $_SESSION['id'];
	$error = 0;
	$formClearPassword = htmlspecialchars($_POST['formPassword']);
    $formPassword = htmlspecialchars(md5($_POST['formPassword']));
    $formPasswordConf = htmlspecialchars(md5($_POST['formPasswordConf']));
    $formReponse = htmlspecialchars($_POST['formReponse']);
	if(isset($_SESSION['id'])) {
	if($formPassword == null || $formPasswordConf == null || $formReponse == null)
	{
		echo '<p class="alert warning"><span class="ico_warning"></span> Debes completar todos los campos.</p>';
	}
	else if($formPassword != $formPasswordConf)
	{
		echo '<p class="alert warning"><span class="ico_warning"></span> Las contraseñas no coinciden.</p>';
	}
	else if($formReponse != htmlentities($_SESSION['SecretAnswer']))
	{
		echo '<p class="alert warning"><span class="ico_warning"></span> La respuesta secreta es incorrecta.</p>';
	}
	else
	{
		$request = $login_db->prepare("UPDATE accounts SET PasswordHash = '$formPassword' WHERE Id = '$g_id'");
		$request->execute(array($formPassword, $formClearPassword, $g_id));
		echo '<p class="alert valid"><span class="ico_check"></span> Contraseña cambiada con éxito.</p>';
	}
	}
	else
	{
        echo '<meta http-equiv="refresh" content="5; url=/home">';
	}			
}
?>