<?php
##################################
# Britana CMS © 2017 - By Ragnar #
##################################

//Nom du serveur
$name = 'Time';

//Nombre de news par page
$news = '4';
//Inscription limiter à une par IP
$OneIP = false;

//Liens du serveur
$vote = '';
$shop = '';
$mega = '#';
$drive = 'https://drive.google.com/file/d/1azYZVEf0i4nYSx7hcd5MBaUK_HDxeK1_/view?usp=share_link';
$mediafire = '#';
$mac = '#';
$forum = '';
$discord = 'https://discord.com/channels/@me/1060392983943462972/1069837796728115241';
$twitter = '#';
$facebook = 'https://www.facebook.com/Yakuzaofdofus';


// Jugadores Online $max
$query = $login_db->query('SELECT CharsCount FROM worlds');
$max_row = $query->fetch(PDO::FETCH_ASSOC);
$max = $max_row['CharsCount'];
$trucho = ($max + 0);


//Vote
$pts_vote = 0;
?>