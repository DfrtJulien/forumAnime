<?php
require_once (__DIR__ . '/../utiles/checkForm.php');

$arrayError = [];

if(isset($_POST['title'])){
    check('title', $_POST['title']);
    check('description', $_POST['title']);

    if(empty($arrayError)){
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $creation_date = date('Y-m-d');
        $userId = $_SESSION['user']['idUser'];


        
        $query = 'INSERT INTO `subject` (`title`, `description`, `creation_date`, `id_user`)
               VALUES (:title, :description, :creation_date, :id_user)';
        $queryStatement = $mysqlClient->prepare($query);
        $queryStatement->bindValue(':title', $title);
        $queryStatement->bindValue(':description', $description);
        $queryStatement->bindValue(':creation_date', $creation_date);
        $queryStatement->bindValue(':id_user', $userId);


        $queryStatement->execute();

        redirectToRoute('/');

        }
    }


require_once (__DIR__ . '/../Views/subject.view.php' );