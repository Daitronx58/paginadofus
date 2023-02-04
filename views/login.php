<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<title><?php echo $name; ?> | Conexión</title>
<div id="content">
<?php
if (!isset($_SESSION['id']))
{
?>
    <h1>Conexión a la cuenta</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Conexión</li>
    </ul>
    <div id="middle">
    <h2>Conexión rechazada</h2>
    <p class="alert error"><span class="ico_close"></span> Nombre de usuario o contraseña incorrecta, serás redirigido!</p>
    </div>
<?php
}
else
{
?>
    <h1>Conexión a la cuenta</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Conexión</li>
    </ul>
    <div id="middle">
    <h2>Conexión satisfactoria</h2>
    <p class="alert infos"><span class="ico_info"></span> Te has conectado satisfactoriamente, serás redirigido!</p>
    </div>
<?php
}
?>
<?php echo '<meta http-equiv="refresh" content="5;URL=/home">'; ?>
</div>