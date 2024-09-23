<?php
    require_once(__DIR__ . "/../partials/head.php");
?>
<h1>Création d'un article</h1>
<form method="POST">
    <div class="col-md-4 mx-auto d-block mt-5">
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" name='title' id="title">
            <?php if (isset($arrayError['title'])) {
				?>
					<p class='text-danger'><?= $arrayError['title'] ?></p>
				<?php
            } ?>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenu</label>
            <textarea class="form-control" name="content"></textarea>
            <?php if (isset($arrayError['content'])) {
				?>
					<p class='text-danger'><?= $arrayError['content'] ?></p>
				<?php
            } ?>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Ajout de l'article</button>
    </div>
</form>

<?php
    require_once(__DIR__ . "/../partials/footer.php");
?>