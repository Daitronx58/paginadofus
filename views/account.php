<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
include('./controllers/ladders.php');
?>
<title>Dofus <?php echo $name; ?> | Grestión de Cuenta</title>
<div id="content">
<?php
if (!isset($_SESSION['id']))
{
?>
    <h1>Error</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Error</li>
    </ul>
    <div id="middle">
    <h2>Acceso denegado</h2>
    <p class="alert error"><span class="ico_close"></span> Debes iniciar sesión para acceder a esta página.</p>
    </div>
<?php
}
else
{
?>
    <h1>Grestión de cuenta</h1> 
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Gestión de cuenta</li>
    </ul>
    <div id="middle">
    <h2>Información personal</h2>
    <center>
    <table class="ladder">
    <tr>
    <td width="170" class="r"><strong>Nombre de cuenta :</strong></td>
    <td><span><?php echo htmlentities($_SESSION['Login']) ?></span></td>
    </tr>
    <tr>
    <td width="170" class="r"><strong>Correo electrónico :</strong></td>
    <td><span><?php echo htmlentities($_SESSION['Email']) ?></span></td>
    </tr>
    <tr>
    <td width="170" class="r"><strong>Apodo :</strong></td>
    <td><span><?php echo htmlentities($_SESSION['Nickname']) ?></span></td>
    </tr>
    <tr>
    <td width="170" class="r"><strong>Ogrinas :</strong></td>
    <td><span><?php echo htmlentities($_SESSION['Ogrinas']) ?></span></td>
    </tr>
    <tr>
    <td width="170" class="r"><strong>Ultima IP registrada :</strong></td>
    <td><span><?php echo htmlentities($_SESSION['LastConnectedIp']) ?></span></td>
    </tr>
    <tr>
    <td width="170" class="r"><strong>Ultima conexión :</strong></td>
    <td><span><?php echo htmlentities($_SESSION['LastConnection']) ?></span></td>
    </tr>
    </table>
    </center>
    <h2>Cambiar contraseña</h2>
        <?php require('./controllers/password.php'); ?>
        <form method="post">
            <label for="">
                <span>Pregunta secreta actual : <?php echo ''.$_SESSION['SecretQuestion'].''; ?></span>
                <small></small>
                Respuesta secreta :
                <small></small>
            </label>
            <input type="text" name="formReponse" placeholder=""/>
            <label for="">
                Nueva contraseña : 
                <small></small>
            </label>
            <input type="password" name="formPassword"/>
            <label for="">
                Confirmación :
                <small></small>
            </label>
            <input type="password" name="formPasswordConf"/>
            <button name="passwordchange" type="sumbit"><span class="ico_edit"></span> Guardar</button>
        </form>
        <?php
        $reqp = $login_db->query('SELECT CharacterId,AccountId FROM worlds_characters WHERE AccountId = '.$_SESSION['Id'].'');
        $myp = $reqp->rowCount();
        ?>
        <h2>Mis personajes (<?php echo ''.$myp.''; ?>)</h2>
        <table class="ladder">
            <thead>
                <tr>
                    <th width="50px" class="c">#</th>
                    <th colspan="2">Personaje</th>
                    <th width="100px" class="c">Nivel</th>
                    <th width="100px" class="c">Kamas</th>
                    <th width="200px" class="r">Vender personaje</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $ristou = $login_db->prepare('SELECT CharacterId,AccountId FROM worlds_characters WHERE AccountId = '.$_SESSION['Id'].'');
            $ristou->execute();
            $pos = 1;
            foreach($ristou as $tum) {
            $request = $game_db->query('SELECT Id,Name,Experience,Breed,Sex,Kamas FROM characters WHERE Id = '.$tum['CharacterId'].'');
            foreach($request as $player)
            {
                echo '<tr>';
                echo '<td class="c"><span class="rang">'.$pos.'</span></td>';
                echo '<td class="i">'.get_img_classe($player['Breed'], $player['Sex']).'</td>';
                echo '<td>'.htmlentities($player['Name']).'</td>';
                echo '<td class="c">'.get_level_by_xp(htmlentities($player['Experience'])).'</td>';
                echo '<td class="c">'.htmlentities($player['Kamas']).'</td>';
                echo '<td class="r"><a class="btn">Sistema de venta no disponible</a></td>';
                echo '</tr>';
                $pos++;
            }
        }
        ?>
                            </tbody>
                        </table>
    </div>
<?php
}
?>
</div>