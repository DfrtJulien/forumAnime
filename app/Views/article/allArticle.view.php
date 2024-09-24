<?php
require_once(__DIR__ . "/../partials/head.php");
?>
<div class="articlesImgContainer">
    <img src="/public//img/articlesImg.png" alt="naruto" class="articleImg">
    <h1 class="theArticles">Les articles :</h1>
</div>
    <?php
    if (isset($articles)) {
        foreach ($articles as $article) {
    ?>
    <h2 class="articlesTitle"><?= $article['title'] ?></h2>
    <div class="articlesContainer">

        <p class="fst-italic dateArticle">Date de création : <?= $article['creation_date'] ?></p>
        <?php
            if (!empty($article['modification_date'])) {
        ?>
            <p class="fst-italic dateArticle">Date de modification : <?= $article['modification_date'] ?></p>
        <?php
            }
        ?>

        <div class="card-body">
            <p class="card-text">Créateur de l'article : <?= $article['pseudo'] ?></p>
            <a href="/article?id=<?= $article['id'] ?>" class="seeArticle">Aller voir l'article</a>
        </div>
        </div>
    <?php
        }
    ?>
    
<?php
    } else {
?>
    <h1>Il n'y a pas d'article encore</h1>

<?php
    }

?>
<div class="container mt-5">

    <a href="/addArticle?subject=<?= $subject ?>" class="addArticleBtn">Ajouter un article</a>
</div>
<?php
require_once(__DIR__ . "/../partials/footer.php");
?>