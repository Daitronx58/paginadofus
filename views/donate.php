<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<title>Dofus <?php echo $name; ?> | Donaciones</title>
<div id="content">
<?php
if (!isset($_SESSION['id']))
{
?>
    <h1>Donar al servidor</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Donaciones</li>
    </ul>
    <div id="middle">
    <h2>Conexión requerida</h2>
    <p class="alert error"><span class="ico_close"></span> Es necesario que ingreses a tu cuenta primero.</p>
    </div>
<?php
}
else
{
?>
    <h1>Donar al servidor</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Donaciones</li>
    </ul>
    <div id="middle">
    <?php if (empty($_SESSION['LastConnection'])) { ?>
    <h2>Página en mantenimiento</h2>
    <p class="alert infos"><span class="ico_info"></span> Está página está en mantenimiento, disculpa las molestias causadas.</p>
    <?php } else { ?>
    <h2>Realiza una donación a Dofus <?php echo $name; ?></h2>
    <p class="alert infos"><span class="ico_info"></span> Las donaciones te permitirán acelerar tu progreso y obtener beneficios estéticos, sin embargo puedes jugar libremente y progresar sin realizar ninguna donación.</p>
    <h2>Selecciona uno de los paquetes que tenemos para tí</h2>

<center>
<br>
<b>Evento x2 Activo hasta el dia 31 de Octubre inclusive</b><br>
<b>Recuerda tener tu cuenta desconectada dentro del juego al momento de realizar el pago.</b><br>
Las Ogrinas serán acreditadas a la cuenta que has ingresado, ésta es: <b><?php echo ''.$_SESSION['Login'].''; ?></b><br>
<form name="pg_frm" method="post" action="https://www.paygol.com/pay">
<input type="hidden" name="pg_serviceid" value="478816">
<input type="hidden" name="pg_currency" value="USD">
<input type="hidden" name="pg_name" value="1000">
<input type="hidden" name="pg_custom" value="<?php echo ''.$_SESSION['Login'].''; ?>">
<input type="hidden" name="pg_price" value="6">
<input type="hidden" name="pg_return_url" value="https://dofusdecay.com/pago_exitoso.php">
<input type="hidden" name="pg_cancel_url" value="https://dofusdecay.com/pago_fallido.php">
<input type="submit" value="2000 Ogrinas - $6.00 USD">
</form>
<form name="pg_frm" method="post" action="https://www.paygol.com/pay">
<input type="hidden" name="pg_serviceid" value="478816">
<input type="hidden" name="pg_currency" value="USD">
<input type="hidden" name="pg_name" value="2200">
<input type="hidden" name="pg_custom" value="<?php echo ''.$_SESSION['Login'].''; ?>">
<input type="hidden" name="pg_price" value="12">
<input type="hidden" name="pg_return_url" value="https://dofusdecay.com/pago_exitoso.php">
<input type="hidden" name="pg_cancel_url" value="https://dofusdecay.com/pago_fallido.php">
<input type="submit" value="4400 Ogrinas - $12.00 USD">
</form>
<form name="pg_frm" method="post" action="https://www.paygol.com/pay">
<input type="hidden" name="pg_serviceid" value="478816">
<input type="hidden" name="pg_currency" value="USD">
<input type="hidden" name="pg_name" value="4800">
<input type="hidden" name="pg_custom" value="<?php echo ''.$_SESSION['Login'].''; ?>">
<input type="hidden" name="pg_price" value="24">
<input type="hidden" name="pg_return_url" value="https://dofusdecay.com/pago_exitoso.php">
<input type="hidden" name="pg_cancel_url" value="https://dofusdecay.com/pago_fallido.php">
<input type="submit" value="9600 Ogrinas - $24.00 USD">
</form>
<form name="pg_frm" method="post" action="https://www.paygol.com/pay">
<input type="hidden" name="pg_serviceid" value="478816">
<input type="hidden" name="pg_currency" value="USD">
<input type="hidden" name="pg_name" value="12500">
<input type="hidden" name="pg_custom" value="<?php echo ''.$_SESSION['Login'].''; ?>">
<input type="hidden" name="pg_price" value="50">
<input type="hidden" name="pg_return_url" value="https://dofusdecay.com/pago_exitoso.php">
<input type="hidden" name="pg_cancel_url" value="https://dofusdecay.com/pago_fallido.php">
<input type="submit" value="25000 Ogrinas - $50.00 USD">
</form>
<form name="pg_frm" method="post" action="https://www.paygol.com/pay">
<input type="hidden" name="pg_serviceid" value="478816">
<input type="hidden" name="pg_currency" value="USD">
<input type="hidden" name="pg_name" value="30000">
<input type="hidden" name="pg_custom" value="<?php echo ''.$_SESSION['Login'].''; ?>">
<input type="hidden" name="pg_price" value="100">
<input type="hidden" name="pg_return_url" value="https://dofusdecay.com/pago_exitoso.php">
<input type="hidden" name="pg_cancel_url" value="https://dofusdecay.com/pago_fallido.php">
<input type="submit" value="60000 Ogrinas - $100.00 USD">
</form>
<form name="pg_frm" method="post" action="https://www.paygol.com/pay">
<input type="hidden" name="pg_serviceid" value="478816">
<input type="hidden" name="pg_currency" value="USD">
<input type="hidden" name="pg_name" value="60000">
<input type="hidden" name="pg_custom" value="<?php echo ''.$_SESSION['Login'].''; ?>">
<input type="hidden" name="pg_price" value="150">
<input type="hidden" name="pg_return_url" value="https://dofusdecay.com/pago_exitoso.php">
<input type="hidden" name="pg_cancel_url" value="https://dofusdecay.com/pago_fallido.php">
<input type="submit" value="120000 Ogrinas - $150.00 USD">
</form>
<form name="pg_frm" method="post" action="https://www.paygol.com/pay">
<input type="hidden" name="pg_serviceid" value="478816">
<input type="hidden" name="pg_currency" value="USD">
<input type="hidden" name="pg_name" value="80000">
<input type="hidden" name="pg_custom" value="<?php echo ''.$_SESSION['Login'].''; ?>">
<input type="hidden" name="pg_price" value="200">
<input type="hidden" name="pg_return_url" value="https://dofusdecay.com/pago_exitoso.php">
<input type="hidden" name="pg_cancel_url" value="https://dofusdecay.com/pago_fallido.php">
<input type="submit" value="160000 Ogrinas - $200.00 USD">
</form>
<img alt="" border="0" src="https://i.imgur.com/llQckVB.png" width="235" height="184">
</center>
    <?php } ?>
    </div>
<?php
}
?>
</div>