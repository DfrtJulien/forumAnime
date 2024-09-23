<?php
require_once ( __DIR__ . "/../utiles/checkForm.php" );

if(isset($_GET['subject']) && isset($_SESSION['user'])){
    if(isset($_POST['title'])){
        check('title', $_POST['title']);
        check('content', $_POST['content']);
    
        if(empty($arrayError)){
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $creation_date = date('Y-m-d');
            $userId = $_SESSION['user']['idUser'];
            $subjectId = $_GET['subject'];
            
            $query = 'INSERT INTO `article` (`title`, `content`, `creation_date`, `id_subject`, `id_user`)
            VALUES (:title, :content, :creation_date, :id_subject, :id_user)';
            $queryStatement = $mysqlClient->prepare($query);
            $queryStatement->bindValue(':title', $title);
            $queryStatement->bindValue(':content', $content);
            $queryStatement->bindValue(':creation_date', $creation_date);
            $queryStatement->bindValue(':id_subject', $subjectId);
            $queryStatement->bindValue(':id_user', $userId);
    
            $queryStatement->execute();

            $lastId = $mysqlClient->lastInsertId();
    
            redirectToRoute('/article?id=' . $lastId);
        }
    }
}else {
    redirectToRoute('/');
}




require_once ( __DIR__ . '/../Views/article/addArticle.view.php');