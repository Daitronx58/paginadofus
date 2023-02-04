<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<title><?php echo $name; ?> | Votes</title>
<div id="content">
    <h1>Classement Vote de <?php echo $name; ?></h1>
    <ul id="breadcrump">
        <li><a href="/home">Accueil</a></li>
        <li>Classement Vote de <?php echo $name; ?></li>
    </ul>
    <div id="middle">
        <h2>Liste des 100 premiers voteur du serveur <?php echo $name; ?></h2>
        <table class="ladder">
            <thead>
                <tr>
                    <th width="50px" class="c">#</th>
                    <th class="l">Pseudonyme</th>
                    <th width="250px" class="c">Dernier vote</th>
                    <th width="150px" class="r">Vote</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $request = $login_db->query('SELECT Nickname,vote,heurevote FROM accounts WHERE vote = 0 ORDER BY vote DESC LIMIT 0,100');
    $pos = 1;
    foreach($request as $accounts)
    {
        echo '<tr>';
        echo '<td class="c"><span class="rang">'.$pos.'</span></td>';
        echo '<td class="l">'.htmlentities($accounts['Nickname']).'</td>';
        echo '<td class="c"><b>'.date('Y-m-d', $accounts['heurevote']).' &agrave; '.date('H:i:s', $accounts['heurevote']).'</b></td>';
        echo '<td class="r"><b>'.$accounts['vote'].'</b></td>';
        echo '</tr>';
        $pos++;
    }
    ?>
            </tbody>
        </table>
    </div>
</div>