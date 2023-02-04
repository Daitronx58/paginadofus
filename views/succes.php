<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<title>Dofus <?php echo $name; ?> | Desconexión</title>
<div id="content">
<?php
if (!isset($_SESSION['id']))
{
?>
    <h1>Desconexión de la cuenta</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Desconexión</li>
    </ul>
    <div id="middle">
    <h2>Te has desconectado</h2>
    <p class="alert valid"><span class="ico_check"></span> Desconexión satisfactoria, serás redirigido.</p>
    </div>
<?php
}
else
{
?>
    <h1>Desconexión de la cuenta</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Desconexión</li>
    </ul>
    <div id="middle">
    <h2>Desconexión denegada</h2>
    <p class="alert infos"><span class="ico_info"></span> Desconexión denegada, serás redirigido.</p>
    </div>
<?php
}
?>
<?php echo '<meta http-equiv="refresh" content="5;URL=/home">'; ?>
</div>