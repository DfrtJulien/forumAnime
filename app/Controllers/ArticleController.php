<?php
require_once(__DIR__ . "/../utiles/checkForm.php");


if (isset($_GET['id'])) {
    $idArticle = $_GET['id'];

    $query = "SELECT `article`.`id`, `article`.`title`, `article`.`content`, `article`.`creation_date`, `article`.`modification_date`, `user`.`pseudo`, `user`.`id` AS user_id
    FROM `article` 
    INNER JOIN `user` ON `article`.`id_user` = `user`.`id`
    WHERE `article`.`id` = :id_article";

    $queryStatement = $mysqlClient->prepare($query);
    $queryStatement->bindValue(':id_article', $idArticle);
    $queryStatement->execute();
    $article = $queryStatement->fetch();


    $queryComment = "SELECT `comment`.`id_article` ,`comment`.`content`, `comment`.`creation_date`,`comment`.`modification_date`,`comment`.`id_user`, `comment`.`id` AS idComment, `article`.`id`, `user`.`pseudo`, `user`.`id`
    FROM `comment` 
    INNER JOIN `article` ON `comment`.`id_article` = `article`.`id` 
    INNER JOIN `user` ON `comment`.`id_user` = `user`.`id` 
    WHERE `comment`.`id_article` = :idArticle";
    $queryStatementComment = $mysqlClient->prepare($queryComment);
    $queryStatementComment->bindValue(':idArticle', $idArticle);
    $queryStatementComment->execute();
    $comments = $queryStatementComment->fetchAll();


    if (isset($_POST['idDelete'])) {
        $id_article = htmlspecialchars($_POST['idDelete']);
        $queryDelete = "DELETE FROM `article` WHERE `id` = :id_article ";
        $queryStatementDelete = $mysqlClient->prepare($queryDelete);
        $queryStatementDelete->bindValue(':id_article', $id_article);
        $queryStatementDelete->execute();
        redirectToRoute('/');
    }

    if (isset($_POST["idCommentDelete"])) {
        $id_comment = htmlspecialchars($_POST['idCommentDelete']);
        $queryDelete = "DELETE FROM `comment` WHERE `id` = :id_comment";
        $queryStatementDelete = $mysqlClient->prepare($queryDelete);
        $queryStatementDelete->bindValue(':id_comment', $id_comment);
        $queryStatementDelete->execute();
        redirectToRoute('/');
    }
}

if (isset($_POST['comment'])) {
    check("comment", $_POST['comment']);

    if (empty($arrayError)) {
        $comment = $_POST['comment'];
        $creationDate = date("Y-m-d");
        $idArticle = $_GET['id'];
        $idUser = $_SESSION['user']['idUser'];

        $query = "INSERT INTO `comment` (`content`, `creation_date`, `id_article`,`id_user`)
        VALUES (:comment, :creation_date, :id_article, :id_user)";
        $queryStatement = $mysqlClient->prepare($query);
        $queryStatement->bindValue(':comment', $comment);
        $queryStatement->bindValue(':creation_date', $creationDate);
        $queryStatement->bindValue(':id_article', $idArticle);
        $queryStatement->bindValue(':id_user', $idUser);

        $queryStatement->execute();
        echo "<meta http-equiv='refresh' content='0'>";
    };
}

require_once(__DIR__ . '/../Views/article/article.view.php');
