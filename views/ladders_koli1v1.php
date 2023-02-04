<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################

include('./controllers/ladders.php');
?>
<title>Dofus <?php echo $name; ?> | Koliseo 1vs1</title>
<div id="content">
    <h1>Ranking Koliseo 1vs1 de <?php echo $name; ?></h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Ranking Koliseo 1vs1 de <?php echo $name; ?></li>
    </ul>
    <div id="middle">
        <h2>Los 100 mejores jugadores en el Koliseo 1vs1 de Dofus <?php echo $name; ?></h2>
        <table class="ladder">
            <thead>
                <tr>
                    <th width="50px" class="c">#</th>
                    <th colspan="2">Personaje</th>
                    <th width="150px">Clase</th>
                    <th width="100px" class="c">Nivel</th>
                    <th width="100px" class="l">Cota</th>
                    <th width="150px" class="r">Victorias</th>
                    <th width="150px" class="r">Derrotas</th>
                    <th width="150px" class="r">Total</th>
                    <th width="150px" class="r">Ratio</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $request = $game_db->query('SELECT Id,Name,Experience,Breed,Sex,ArenaRank_1vs1,ArenaMaxRank_1vs1,ArenaDailyMaxRank_1vs1,ArenaDailyMatchsCount_1vs1,ArenaDailyMatchsWon_1vs1 FROM characters WHERE ArenaDailyMatchsCount_1vs1 != 0 ORDER BY ArenaRank_1vs1 DESC LIMIT 0,100');
    $pos = 1;
    foreach($request as $player)
    {
        $loose = ($player['ArenaDailyMatchsCount_1vs1'] - $player['ArenaDailyMatchsWon_1vs1']);
        $x = 100;
		$ratio = round(($player['ArenaDailyMatchsWon_1vs1'] / $player['ArenaDailyMatchsCount_1vs1']) * 100, 2);

        global $x;

        echo '<tr>';
        echo '<td class="c"><span class="rang">'.$pos.'</span></td>';
        echo '<td>'.get_img_classe($player['Breed'], $player['Sex']).'</td>';
        echo '<td>'.htmlentities($player['Name']).'</td>';
        echo '<td><i>'.get_name_classe($player['Breed']).'</i></td>';
        echo '<td class="c">'.get_level_by_xp(htmlentities($player['Experience'])).'</td>';
        echo '<td class="l"><b>'.$player['ArenaRank_1vs1'].'<b></td>';
        echo '<td class="r"><b>'.$player['ArenaDailyMatchsWon_1vs1'].'<b></td>';
        echo '<td class="r"><b>'.$loose.'<b></td>';
        echo '<td class="r"><b>'.$player['ArenaDailyMatchsCount_1vs1'].'<b></td>';
        echo '<td class="r"><b>'.$ratio.'<b></td>';
        echo '</tr>';
        $pos++;
    }
    ?>
            </tbody>
        </table>
    </div>
</div>