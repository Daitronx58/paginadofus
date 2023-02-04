<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################
?>
<title>Dofus <?php echo $name; ?> | Inicio</title>
<div id="content">
    <h1>Hola y bienvenido a Dofus <?php echo $name; ?>!</h1>
    <ul id="breadcrump">
        <li><a href="/home">Inicio</a></li>
        <li>Novedades del Servidor</li>
    </ul>
    <div id="news">
<?php
    $newsByPages = $news;
    $page = 1;
    if(isset($_GET['p']))$page = intval($_GET['p']);
    
    // Get news count
    $newsCnt = $login_db->query('SELECT COUNT(*) as `cnt` FROM b_news')->fetch()["cnt"];
    
    setlocale(LC_TIME, 'spanish', 'es_ES');
    $request = $login_db->query('SELECT * FROM b_news ORDER BY id DESC LIMIT '.($newsByPages*($page-1)).','.$newsByPages);
    foreach ($request as $new) {
        $id = ''.$new['id'].'';
        $title = ''.$new['title'].'';
        $content = ''.nl2br(stripslashes($new['content'])).'';
        $author = ''.$new['author'].'';
        $img = ''.$new['img'].'';
        $date = ''.ucwords(utf8_encode(strftime("%d %B %Y", strtotime($new['date'])))).'';
?>
        <article>
            <div class="header" style="background-image:url('/template/img/news/<?php echo $img ?>.jpg');">
                <h2><img src="/template/img/i_news.png"/> <?php echo $title ?></h2>
            </div>
            <p><?php echo $content ?></p>
            <div class="footer">
                Publicado el <strong><?php echo ''.$date.'' ?></strong> por <strong><?php echo $author ?></strong>.
                <a href="/article/<?php echo $id + 1 ?>"><img src="/template/img/i_bulle.png"/> Ver más</a>
            </div>
        </article>
<?php
}
?>
                        <div class="clear"></div>
                    </div>
                </div>
<?php
$pageCnt = ceil($newsCnt/$newsByPages);

$hasPrevious = $page > 1;
$hasNext = $page < $pageCnt;

if($hasPrevious || $hasNext) {
?>
<div id="content" style="min-height: 0px!important;"><div id="middle"><h2 align="center">
<?php
if($hasPrevious && $hasNext)    
    echo "<a href='/home/page/".($page-1)."'>Pagina anterior</a> - ";
else if($hasPrevious)    
    echo "<a href='/home/page/".($page-1)."'>Pagina anterior</a>";
if($hasNext)        
    echo "<a href='/home/page/".($page+1)."'>Pagina siguiente</a>";
?>
</h2></div></div>
<?php
}
?>