<?php
require_once(__DIR__ . "/partials/head.view.php");

?>
<h1>Un commit</h1>
<p><?= $myCommit->getText(); ?></p>
<p>Date de création <?= $myCommit->getCreationDate();?></p>


<?php
    if($myCommit->getModificationDate()){
        ?>
            <p>Date de modification <?= $myCommit->getModificationDate();?></p>
        <?php
    }
?>
<a href="/modifier?id=<?= $myCommit->getIdCommit();?>" class="btn btn-warning">Modifier</a>
<?php
require_once(__DIR__ . "/partials/footer.view.php");