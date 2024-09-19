<?php
 require_once(__DIR__ . "/../utiles/checkForm.php");


 $arrayError = [];

if(isset($_POST['pseudo'])){
    check('pseudo', $_POST['pseudo']);
    check('mail', $_POST['mail']);
    check('password', $_POST['password']);

    if(empty($arrayError)){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $password = htmlspecialchars($_POST['password']);
        $register_date = date('Y-m-d');
        $role = 2;

        //Verifie si l'utilisateur existe:
        //On prepare la requete:
        $userQuery = 'SELECT * FROM `user` WHERE mail = :mail';
        // Je prepare ma requete sql a l'envoie
        $userStatement = $mysqlClient->prepare($userQuery);
        // Je modifie la valeur du mail reçu
        $userStatement->bindParam(':mail', $mail);
        //On execute la requete avec le param' mail
        $userStatement->execute();
        //dans la variable user je met la reponse de ma requete
        $user = $userStatement->fetch();

        if($user){
            //s'il exist on renvoie vers /
            redirectToRoute('/');
        } else {
        //Hash le mot de passe :
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        //Je peux envoyer la requetes :
        $query = 'INSERT INTO user (`pseudo`, `mail`, `password`, `register_date`, `id_role`)
              VALUES (:pseudo, :mail, :password, :register_date, :id_role)';
        $queryStatement = $mysqlClient->prepare($query);
        $queryStatement->bindValue(':pseudo', $pseudo);
        $queryStatement->bindValue(':mail', $mail);
        $queryStatement->bindValue(':password', $passwordHash);
        $queryStatement->bindValue(':register_date', $register_date);
        $queryStatement->bindValue(':id_role', $role);

        $queryStatement->execute();

        redirectToRoute('/');

        }
    }
}

require_once(__DIR__ . "/../Views/security/register.view.php");