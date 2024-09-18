<?php

try {
    // ici je me connecte a ma base de données
    $mysqlClient = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root');
} catch(Exception $e){
    // ici j'attrape l'erreur
    die('ERREUR : ' . $e->getMessage());
}