<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<title>Dofus <?php echo $name; ?> | Registro</title>
<div id="content">
    <h1>Crear una cuenta</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Crear una cuenta</li>
    </ul>
    <div id="middle">
        <h2>Comienza a jugar en Dofus <?php echo $name; ?> !</h2>
        <p>
        <strong>Para comenzar a jugar en Dofus Toxic el primer paso es registrarse, y este es el lugar.</strong></br>
        Recuerda utilizar un correo electrónico válido, de lo contrario en caso de extravío de contraseña o perdida de algun dato no podrás recuperar!
        </p>
        <h2>Presta atención a tus datos</h2>
        <p>
        En <?php echo $name; ?> los datos de las cuentas son encriptados rigurosamente, protegiendo de esta manera la privacidad y la integridad de las cuentas registradas.<br>
		Por lo tanto incluso el equipo de Desarrollo es incapaz de ver tu contraseña, esto significa que si ingresas la contraseña de forma equivocada nuestro STAFF no podrá facilitartela.
        </p>
        <h2>Formulado de Registro</h2>
        <?php require('./controllers/register.php'); ?>
        <form method="post">
            <label for="">
                <span>*</span> Nombre de cuenta :
            </label>
            <input type="text" name="formAccount"/>
            <label for="">
                <span>*</span> Contraseña :
            </label>
            <input type="password" name="formPassword"/>
            <label for="">
                <span>*</span> Confirmación :
            </label>
            <input type="password" name="formPasswordConf"/>
            <label for="">
                <span>*</span> Apodo :
            </label>
            <input type="text" name="formPseudo"/>
            <label for="">
                <span>*</span> Correo electrónico :
            </label>
            <input type="text" name="formEmail"/>
            <label for="">
                <span>*</span> Pregunta secreta :
            </label>
            <input type="text" name="formQuestion"/>
            <label for="">
                <span>*</span> Respuesta secreta :
            </label>
            <input type="text" name="formReponse"/>
            <label for="">
            <div class="g-recaptcha" data-sitekey="6LfSC78ZAAAAAKwLs16o6whFKVkU9ygs3oijWD-G"></div></br>
            </label>
            <button style="padding: 15px 90px!important;" name="register_validation" type="sumbit">Registrarse</button>
        </form>
    </div>
</div>




