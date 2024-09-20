<?php

$query = "SELECT `id`, `title`, `description` FROM `subject`";
$queryStatement = $mysqlClient->prepare($query);
$queryStatement->execute();
$subjects = $queryStatement->fetchAll();


require_once (__DIR__ . '/../Views/home.view.php');