<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################

$fal = 0;

function RpgCnt()  {
      
    $cnt = file_get_contents('http://www.rpg-paradize.com/info_site-'.urlencode("109920"));

    $out = explode('Clic Sortant : ', $cnt);
    return explode('</td>', $out[1])[0];
}


if(isset($_POST['goToLink'])) {
    $request = $login_db->prepare('UPDATE accounts SET LastConnectedIp = ? WHERE Id = ?');
    $request->execute(array($_SERVER['REMOTE_ADDR'], $_SESSION['id']));

    $request = $login_db->prepare('SELECT * FROM accounts WHERE Id = ?');
    $request->execute(array($_SESSION['id']));
    $row = $request->fetch();
    
    if (isset($row)) {
        $pt = $_SESSION['NewTokens'];
        $vote = $row['vote'];
        $hv = $row['heurevote'];
        
        $time = time();
        $condition = ($time - $hv) / 60;
            if($condition > 180 || $hv == 0) {
                if($_POST['out'] == RpgCnt() || $_POST['out'] == RpgCnt()-3 || $_POST['out'] == RpgCnt()-2 || $_POST['out'] == RpgCnt()-1 || $_POST['out'] == RpgCnt()+1 || $_POST['out'] == RpgCnt()+2 || $_POST['out'] == RpgCnt()+3) {
                    $request = $game_db->prepare('UPDATE accounts_tokens SET NewTokens = ? WHERE AccountId = ?');
                    $request->execute(array($pt + $pts_vote,$_SESSION['id']));
                    $_SESSION['pts'] = $pt + $pts_vote;
                    $request = $login_db->prepare('UPDATE accounts SET heurevote = ? WHERE LastConnectedIp = ? OR LastConnectedIp = ?');
                    $request->execute(array( time(),$_SESSION['LastConnectedIp'], $_SERVER['REMOTE_ADDR']));
                    $_SESSION['heurevote'] = time();
                    $request = $login_db->prepare('UPDATE accounts SET vote = ? WHERE Id = ?');
                    $request->execute(array($vote + 1, $_SESSION['id']));
                    $_SESSION['vote'] = $vote + 1;
                    ?>
                    <h1>Vote & Gagne</h1>
                    <ul id="breadcrump">
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="medias.html">Vote & Gagne</a></li>
                    </ul>
                    <div id="middle">
                        <h2>Vote accepté</h2>
                        <p class="alert valid"><span class="ico_check"></span> Votre vote a bien &eacute;t&eacute; valid&eacute;, vous aller &ecirc;tre redirig&eacute;.</p>
                        <p class="alert infos"><span class="ico_info"></span> Penser à bien déco/reco in game pour avoir vos points.</p>
                    </div>
                </div>
                    <?php
                    require('./include/footer.php');
                    echo '<meta http-equiv="refresh" content="10;URL=/home">';
                    exit(0);
                } else {
                    $fal = 2;
                }
                }
                else
                    $fal = 1;
            }
            else
                $fal = 1;
        }
?>