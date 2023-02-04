<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################

include('./controllers/ladders.php');
?>
<title>Dofus <?php echo $name; ?> | Honor</title>
<div id="content">
    <h1>Ranking Honor de <?php echo $name; ?></h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Ranking Honor de <?php echo $name; ?></li>
    </ul>
    <div id="middle">
        <h2>Los 100 jugadores con mas Honor de Dofus <?php echo $name; ?></h2>
        <table class="ladder">
            <thead>
                <tr>
                    <th width="50px" class="c">#</th>
                    <th colspan="2">Personaje</th>
                    <th width="150px">Clase</th>
                    <th width="100px" class="c">Nivel</th>
                    <th width="100px" class="c">Prestigio</th>
                    <th width="100px" class="l">Alineamiento</th>
                    <th width="150px" class="r">Honor</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $request = $game_db->query('SELECT Id,Name,Experience,Breed,Sex,PrestigeRank,AlignmentSide,Honor FROM characters WHERE Honor > 0 ORDER BY Honor DESC LIMIT 0,100');
    $pos = 1;
    foreach($request as $player)
    {
        echo '<tr>';
        echo '<td class="c"><span class="rang">'.$pos.'</span></td>';
        echo '<td>'.get_img_classe($player['Breed'], $player['Sex']).'</td>';
        echo '<td>'.htmlentities($player['Name']).'</td>';
        echo '<td><i>'.get_name_classe($player['Breed']).'</i></td>';
        echo '<td class="c">'.get_level_by_xp(htmlentities($player['Experience'])).'</td>';
        echo '<td class="c">'.htmlentities($player['PrestigeRank']).'</td>';
        echo '<td class="l">'.get_rang_by_classe(htmlentities($player['AlignmentSide'])).'</td>';
        echo '<td class="r"><b>'.$player['Honor'].'<b></td>';
        echo '</tr>';
        $pos++;
    }
    ?>
            </tbody>
        </table>
    </div>
</div>