<?php
require_once(__DIR__ . "/../partials/head.php");
?>
<div class="article">
    <h1><?= $article['title'] ?></h1>
    <p class="articleContent"><?= $article['content'] ?></p>
    <p class="dateArticle">Date de création : <?= $article['creation_date'] ?></p>
    <?php
    if (!empty($article['modification_date'])) {
    ?>
        <p class="dateArticle">Date de modification : <?= $article['modification_date'] ?></p>
    <?php
    }
    ?>
    <p class="articleCreator">Créer par : <a class="creatorLink "href="/profile?id=<?= $article['user_id'] ?>"><?= $article['pseudo'] ?></a></p>
    <div class="articleBtnContainer">
    <?php
    if ($_SESSION['user']['idUser'] == $article['user_id']) {
    ?>
        <a class="editBtn" href="/editArticle?id=<?= $article['id'] ?>" class="btn colorYellow">Modifier</a>
    <?php
    }
    if ($_SESSION['user']['idUser'] == $article['user_id'] || $_SESSION['user']['role'] == "Admin") {
    ?>
        <form action="" method="POST">
            <input type="hidden" id="idDelete" name="idDelete" value="<?= $article['id'] ?>">
            <button class="deleteBtn" type="submit" class="btn">Supprimer</button>
        </form>
    <?php
    }
    ?>
    </div>
</div>
<?php
require_once(__DIR__ . "/../partials/footer.php");
?>