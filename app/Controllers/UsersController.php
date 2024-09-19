<?php
if($_SESSION['user']['role'] != "Admin"){
    require_once (__DIR__ . '/404Controller.php');
} else {
    
    function getUsersRole($value){
        global $mysqlClient;
        $query = "SELECT `pseudo`, `id` FROM `user` WHERE `id_role` = :id_role";
        $queryStatement = $mysqlClient->prepare($query);
        $queryStatement->bindParam(':id_role', $value);
        $queryStatement->execute();
        return $queryStatement->fetchAll();
    }

    $admins = getUsersRole(2);
    $users = getUsersRole(1);

    require_once (__DIR__ . '/../Views/users.view.php');
}