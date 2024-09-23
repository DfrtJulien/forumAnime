<?php
if(isset($_GET['id'])){
    $subject = $_GET['id'];

    $query = "SELECT `article`.`id`, `article`.`title`, `article`.`creation_date`, `article`.`modification_date`, `user`.`pseudo`
    FROM `article`
    INNER JOIN `user` ON `article`.`id_user` = `user`.`id`
    WHERE `article`.`id_subject` =  :id_subject";

    $queryStatement = $mysqlClient->prepare($query);
    $queryStatement->bindValue(':id_subject', $subject);
    $queryStatement->execute();
    $articles = $queryStatement->fetchAll();



}

require_once ( __DIR__ . '/../Views/article/allArticle.view.php');