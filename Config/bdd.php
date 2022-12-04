<?php
$dsn = 'mysql:dbname=association;host=localhost';
$user = 'association';
$password = 'h7B@/a(MDC]fGQPH';

try {
    $bdd = new PDO($dsn, $user, $password, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
}catch(PDOException $e){
    //echo 'Erreur' . $e->getMessage();
    die('Erreur bdd');
}
//var_dump($bdd);
?>