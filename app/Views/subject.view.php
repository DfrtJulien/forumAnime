<?php
    require_once(__DIR__ . "/partials/head.php");
?>
    <h1>Ajout d'un sujet</h1>
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
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description"></textarea>
            <?php if (isset($arrayError['description'])) {
				?>
					<p class='text-danger'><?= $arrayError['description'] ?></p>
				<?php
            } ?>
        </div>
        
        <button type="submit" class="btn colorPurpel mt-3">Ajout du sujet</button>
    </div>
</form>
<?php
    require_once(__DIR__ . "/partials/footer.php");
?>