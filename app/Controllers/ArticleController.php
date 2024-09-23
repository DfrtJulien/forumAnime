<?php
if(isset($_GET['id'])){
    $idArticle = $_GET['id'];

    $query = "SELECT `article`.`id`, `article`.`title`, `article`.`content`, `article`.`creation_date`, `article`.`modification_date`, `user`.`pseudo`, `user`.`id` AS user_id
    FROM `article` 
    INNER JOIN `user` ON `article`.`id_user` = `user`.`id`
    WHERE `article`.`id` = :id_article";

    $queryStatement = $mysqlClient->prepare($query);
    $queryStatement->bindValue(':id_article', $idArticle);
    $queryStatement->execute();
    $article = $queryStatement->fetch();

    if(isset($_POST['idDelete'])){
        $id_article = htmlspecialchars($_POST['idDelete']);
        $queryDelete = "DELETE FROM `article` WHERE `id` = :id_article ";
        $queryStatementDelete = $mysqlClient->prepare($queryDelete);
        $queryStatementDelete->bindValue(':id_article', $id_article);
        $queryStatementDelete->execute();
        redirectToRoute('/');
    }

}


require_once ( __DIR__ . '/../Views/article/article.view.php');