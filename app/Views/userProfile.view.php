<?php
    require_once(__DIR__ . "/partials/head.php");
?>
    <h1>Profil <?= $response['pseudo'] ?></h1>
    <?php
    if($_SESSION['user']['role'] == "Admin"){
        ?>
            <p>Mail : <?= $response['mail'] ?></p>
        <?php
    }
    ?>
    <p>Inscription: <?= $response['register_date'] ?></p>
    <p>Role : <?= $response['name'] ?></p>

<?php
    include_once(__DIR__ . "/partials/footer.php");
?>