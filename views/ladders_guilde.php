<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################

include('./controllers/ladders.php');
?>
<title>Dofus <?php echo $name; ?> | Guildes</title>
<div id="content">
    <h1>Ranking Gremios de <?php echo $name; ?></h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Ranking Gremios de <?php echo $name; ?></li>
    </ul>
    <div id="middle">
        <h2>Los 100 gremios mas poderosos de Dofus <?php echo $name; ?></h2>
        <table class="ladder">
            <thead>
                <tr>
                    <th width="50px" class="c">#</th>
                    <th class="l">Nombre del Gremio</th>
                    <th width="50px" class="c">Nivel</th>
                    <th width="150px" class="r">Experiencia</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $request = $game_db->query('SELECT Name,Experience FROM guilds ORDER BY Experience DESC LIMIT 0,100');
    $pos = 1;
    foreach($request as $guilds)
    {
        echo '<tr>';
        echo '<td class="c"><span class="rang">'.$pos.'</span></td>';
        echo '<td class="l">'.htmlentities($guilds['Name']).'</td>';
        echo '<td class="c"><b>'.get_level_by_guilde(htmlentities($guilds['Experience'])).'</b></td>';
        echo '<td class="r">'.htmlentities($guilds['Experience']).'</td>';
        echo '</tr>';
        $pos++;
    }
    ?>
            </tbody>
        </table>
    </div>
</div>