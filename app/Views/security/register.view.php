<?php
require_once(__DIR__ . '/../partials/head.php');
?>
<div class="container my-3 registerContainer">
    <div class="d-flex my-3">
        <h1 class="my-4">Inscription</h1>
        <img src="/public/img/registerLogo.png" alt="" class="registerLogo">
    </div>
   
    <form method="POST" class="registerForm">
        <div class="mb-3 my-5">
            <label for="pseudo" class="form-label fs-3 text-white">Pseudo</label>
            <input type="text" class="form-control" name="pseudo"  placeholder="Entrez votre pseudo">
            <?php 
                if(isset($arrayError['pseudo'])){
                    ?>
                    <p class="registerErrorP">Merci de renseigner un pseudo valide</p>
                    <?php
                }
            
            ?>
        </div>
        <div class="mb-3 my-5">
            <label for="mail" class="form-label fs-3 text-white">Adresse mail</label>
            <input type="email" class="form-control"  name="mail" placeholder="Entrez votre mail">
            <?php 
                if(isset($arrayError['mail'])){
                    ?>
                    <p class="registerErrorP">Merci de renseigner un mail valide</p>
                    <?php
                }
            
            ?>
        </div>
        <div class="mb-3 my-5">
            <label for="password" class="form-label fs-3 text-white">Mot de passe</label>
            <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe">
            <?php 
                if(isset($arrayError['password'])){
                    ?>
                    <p class="registerErrorP">Merci de renseigner un mot de passe de 8 caractère minimum au moin une minuscule et une majuscule et avec un caractère spécial!</p>
                    <?php
                }
            
            ?>
        </div>
        <button type="submit" class="registerBtn mt-3">S'inscrire</button>
    </form>
</div>



<?php
include_once(__DIR__ . '/../partials/footer.php');
?>