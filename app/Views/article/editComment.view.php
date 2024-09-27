<?php
require_once(__DIR__ . "/../partials/head.php");
?>

<div class=" mt-2 commentContainer">
  <form action="" method="POST">
    <label for="comment" class="form-label commentLabel">Modifier votre commentaire :</label>
    <textarea class="form-control commentArea" name="editComment"></textarea>
    <button class="addComment" type="submit">Modifier un commentaire</button>
    <?php if (isset($arrayError['content'])) {
    ?>
      <p class='text-danger'><?= $arrayError['content'] ?></p>
    <?php
    } ?>
  </form>
</div>


<?php
require_once(__DIR__ . "/../partials/footer.php");
?>