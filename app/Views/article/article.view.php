<?php
    require_once(__DIR__ . "/../partials/head.php");
?>
<h1><?= $article['title'] ?></h1>
<p><?= $article['content'] ?></p>
<p>Date de création : <?= $article['creation_date'] ?></p>
<?php
if(!empty($article['modification_date'])){
?>
<p>Date de modification : <?= $article['modification_date'] ?></p>
<?php
}
?>
<p>Créer par : <a href="/profile?id=<?= $article['user_id'] ?>"><?= $article['pseudo'] ?></a></p>

<?php
    require_once(__DIR__ . "/../partials/footer.php");
?>