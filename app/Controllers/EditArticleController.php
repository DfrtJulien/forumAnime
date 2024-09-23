<?php
require_once ( __DIR__ . "/../utiles/checkForm.php" );

if(isset($_GET['id'])){
    $idArticle = $_GET['id'];

    $query = "SELECT `article`.`title`, `article`.`content`
    FROM `article` 
    WHERE `article`.`id` = :id_article";

    $queryStatement = $mysqlClient->prepare($query);
    $queryStatement->bindValue(':id_article', $idArticle);
    $queryStatement->execute();
    $article = $queryStatement->fetch();

    if(isset($_POST['title'])){
        check('title', $_POST['title']);
        check('content', $_POST['content']);

        if(empty($arrayError)){
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $modification_date = date('Y-m-d');
            
            $query = 'UPDATE `article` 
            SET `title` = :title, `content` = :content, `modification_date` = :modification_date 
            WHERE `article`.`id` = :id_article';
            $queryStatement = $mysqlClient->prepare($query);
            $queryStatement->bindValue(':title', $title);
            $queryStatement->bindValue(':content', $content);
            $queryStatement->bindValue(':modification_date', $modification_date);
            $queryStatement->bindValue(':id_article', $idArticle);

            $queryStatement->execute();
    
            redirectToRoute('/article?id=' . $idArticle);
        }

    }



}
require_once ( __DIR__ . '/../Views/article/editArticle.view.php');