<?php
    require_once(__DIR__ . "/../partials/head.php");
?>
    <h1>Les articles</h1>
    <a href="/addArticle?subject=<?= $subject ?>" class="btn btn-primary">Ajouter un article</a>
    <div class="col-8 mx-auto d-block mt-5">
        <?php
        if(isset($articles)){
            foreach($articles as $article){
            ?>
            <div class="card mt-3 mb-3">
                <div class="card-header colorPink">
                    <h2><?= $article['title'] ?></h2>
                    <p class="fst-italic">Date de création : <?= $article['creation_date'] ?></p>
                    <?php 
                    if(!empty($article['modification_date'])){
                    ?>
                    <p class="fst-italic">Date de modification : <?= $article['modification_date'] ?></p>
                    <?php
                    }
                    ?>
                    </div>
           
                <div class="card-body">
                    <p class="card-text"><?= $article['pseudo'] ?></p>
                    <a href="/article?id=<?= $article['id'] ?>" class="btn btn-primary">Aller voir l'article</a>
                </div>
            </div>
            <?php
            }
            ?>
            </div>
        <?php
        }else {
?>
    <h1>Il n'y a pas d'article encore</h1>

<?php
    }
?>
<?php
    require_once(__DIR__ . "/../partials/footer.php");
?>