<?php
require_once(__DIR__ . "/partials/head.php");
?>
<div class="userProfil">
    <h1 class="userName">Profil de : <?= $response['pseudo'] ?></h1>
    <div class="userInfo">
        <?php
        if ($_SESSION['user']['role'] == "Admin") {
        ?>
            <p>Mail : <?= $response['mail'] ?></p>
        <?php
        }
        ?>
        <p>Inscription: <?= $response['register_date'] ?></p>
        <p>Role : <?= $response['name'] ?></p>
    </div>
</div>
<?php
include_once(__DIR__ . "/partials/footer.php");
?>