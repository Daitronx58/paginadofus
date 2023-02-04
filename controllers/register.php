<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################

if(isset($_POST['register_validation']))
{
    $error = 0;
    $formAccount = htmlspecialchars(strtolower($_POST['formAccount']));
    $formPassword = htmlspecialchars(md5($_POST['formPassword']));
    $formPasswordConf = htmlspecialchars(md5($_POST['formPasswordConf']));
    $formEmail = htmlspecialchars($_POST['formEmail']);
    $formPseudo = htmlspecialchars($_POST['formPseudo']);
    $formQuestion = htmlspecialchars($_POST['formQuestion']);
    $formReponse = htmlspecialchars($_POST['formReponse']);

    $secret="6LfSC78ZAAAAAP6ef2bR7D_wPzwzgNphPPsuw4ml";
    $response=$_POST["g-recaptcha-response"];
    $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
    $captcha_success=json_decode($verify);
 
    if ($captcha_success->success==false) 
	{
		echo '<p class="alert warning"><span class="ico_warning"></span> Debes completar el captcha.</p>';
    }

    elseif($formAccount == null || $formPassword == null || $formPasswordConf == null || $formPseudo == null || $formEmail == null || $formQuestion == null || $formReponse == null)
    {
        echo '<p class="alert warning"><span class="ico_warning"></span> Porfavor complete todos los campos.</p>';
    }
    elseif($formPasswordConf != $formPassword)
    {
        echo '<p class="alert warning"><span class="ico_warning"></span> Las contraseñas no coinciden.</p>';
    }
    elseif(strlen($formAccount) < 4)
    {
        echo '<p class="alert warning"><span class="ico_warning"></span> El nombre de usuario es muy corto.</p>';
    }
    elseif(!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $formEmail))
    {
        echo '<p class="alert warning"><span class="ico_warning"></span> El formato del correo electrónico es inválido.</p>';
    }
    elseif(!preg_match("#^[a-zA-Z0-9._-]+$#", $formPseudo))
    {
        echo '<p class="alert warning"><span class="ico_warning"></span> El apodo solo puede contener letras y números.</p>';
    }
    elseif(!preg_match("#^[a-zA-Z0-9]+$#", $formAccount))
    {
        echo '<p class="alert warning"><span class="ico_warning"></span> El nombre de usuario solo puede contener letras y números.</p>';
    }
    else
    {
        $request = $login_db->prepare('SELECT Login FROM accounts WHERE Login = ?');
        $request->execute(array($formAccount));
        $row = $request->fetch();
        $req = $login_db->prepare('SELECT Nickname FROM accounts WHERE Nickname = ?');
        $req->execute(array($formPseudo));
        $row2 = $req->fetch();
        if($row['Login'] == $formAccount)
        {
            echo '<p class="alert warning"><span class="ico_warning"></span> El nombre de usuario ya existe.</p>';
        }
        else if($row2['Nickname'] == $formPseudo)
        {
            echo '<p class="alert warning"><span class="ico_warning"></span> El apodo ya existe.</p>';
        }
        else
        {
            $request = $login_db->prepare('SELECT MAX(Id) AS max FROM accounts');
            $request->execute();
            $row = $request->fetch();
            $date = date("y/m/d H:i:s", time());
            $subscriptionEnd = date("y/m/d H:i:s", 0);

            $request = $login_db->prepare('INSERT INTO accounts (Id, Login, PasswordHash, Nickname, Email, SecretQuestion,  SecretAnswer, CreationDate, Lang, UserGroupId, IsBanned, SubscriptionEnd) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
            $request->execute(array($row['max'] + 1,$formAccount,$formPassword,$formPseudo,$formEmail,$formQuestion,$formReponse, $date, 'es', '1', '0', $subscriptionEnd));
            echo '<p class="alert valid"><span class="ico_check"></span> Te has registrado satisfactoriamente, bienvenido a Dofus Toxic!</p>';
        }
    }
}
?>