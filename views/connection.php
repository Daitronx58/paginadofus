<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<title>Dofus <?php echo $name; ?> | Conexión</title>
<div id="content">
    <h1>Conectarse a la página</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Inicia sesión</li>
    </ul>
    <div id="middle">
        <h2>Formulario de conexión</h2>
        <form method="post">
            <label for="">
                <span>*</span> Nombre de cuenta :
                <small>Ingresa tu nombre de cuenta.</small>
            </label>
            <input type="text" name="formuser"/>
            <label for="">
                <span>*</span> Contraseña :
                <small>Ingresa tu contraseña.</small>
            </label>
            <input type="password" name="formpass"/>
            <button style="padding: 15px 90px!important;" name="connection" type="sumbit">Ingresar</button>
        </form>
    </div>
</div>