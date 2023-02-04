<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################

include('./controllers/ladders.php');
?>
<title>Dofus <?php echo $name; ?> | PvM</title>
<div id="content">
    <h1>Ranking PvM de <?php echo $name; ?></h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Ranking PvM de <?php echo $name; ?></li>
    </ul>
    <div id="middle">
        <h2>Los mejores 100 jugadores PVM de Dofus <?php echo $name; ?></h2>
        <table class="ladder">
            <thead>
                <tr>
                    <th width="50px" class="c">#</th>
                    <th colspan="2">Personaje</th>
                    <th width="150px">Clase</th>
					<th width="100px" class="f">Prestigio</th>
                    <th width="100px" class="c">Nivel</th>
                    <th width="100px" class="c">Kamas</th>
                    <th width="150px" class="r">Experiencia</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $request = $game_db->query('SELECT Id,Name,Experience,PrestigeRank,Breed,Sex,Kamas FROM characters WHERE Experience > 0 ORDER BY PrestigeRank DESC LIMIT 0,100');
    $pos = 1;
    foreach($request as $player)
    {
        echo '<tr>';
        echo '<td class="c"><span class="rang">'.$pos.'</span></td>';
        echo '<td>'.get_img_classe($player['Breed'], $player['Sex']).'</td>';
        echo '<td>'.htmlentities($player['Name']).'</td>';
        echo '<td><i>'.get_name_classe($player['Breed']).'</i></td>';
		echo '<td class="f"><b>'.$player['PrestigeRank'].'</b></td>';
        echo '<td class="c">'.get_level_by_xp(htmlentities($player['Experience'])).'</td>';
        echo '<td class="c">'.htmlentities($player['Kamas']).'</td>';
        echo '<td class="r"><b>'.$player['Experience'].'</b></td>';
        echo '</tr>';
        $pos++;
    }
    ?>
            </tbody>
        </table>
    </div>
</div>