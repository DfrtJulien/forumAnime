<?php
require_once(__DIR__ . "/../utiles/checkForm.php");

if (isset($_GET['id'])) {
  $id_comment = $_GET['id'];

  if (isset($_POST['editComment'])) {
    var_dump($_POST['editComment']);
    if (empty($arrayError)) {
      $comment = htmlspecialchars($_POST['editComment']);
      $modification_date = date('Y-m-d');

      $query = 'UPDATE `comment` 
      SET `content` = :comment, `modification_date` = :modification_date 
      WHERE `comment`.`id` = :id_comment';
      $queryStatement = $mysqlClient->prepare($query);
      $queryStatement->bindValue(':id_comment', $id_comment);
      $queryStatement->bindValue(':modification_date', $modification_date);
      $queryStatement->bindValue(':comment', $comment);

      $queryStatement->execute();


      $queryArticle = "SELECT `id_article` 
      FROM `comment`
      WHERE id = :id";
      $queryStatementArticle = $mysqlClient->prepare($queryArticle);
      $queryStatementArticle->bindValue(':id', $id_comment);
      $queryStatementArticle->execute();
      $idArticle = $queryStatementArticle->fetch();

      redirectToRoute('/article?id=' . $idArticle['id_article']);
    }
  }
}














require_once(__DIR__ . '/../Views/article/editComment.view.php');
