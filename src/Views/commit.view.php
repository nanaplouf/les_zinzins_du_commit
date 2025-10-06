<?php
require_once(__DIR__ . "/partials/head.view.php");
?>
<div class="container">
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

    <?php
        if(isset($_SESSION['user']) && $_SESSION['user']['id_user'] === $myCommit->getUserId()){
    ?>
        <a href="/modifier?id=<?= $myCommit->getIdCommit();?>" class="btn btn-warning">Modifier</a>
    <?php
        }
        if(isset($_SESSION['user'])){
        ?>
            <form method="POST">
                <div class="container">
                    <div class="form-group">
                        <label for="comment" class="form-label">Quelque chose à dire ?</label>
                        <textarea class="form-control" id="comment" name="comment" style="height: 100px"></textarea>
                        <?php
                        if(isset($this->arrayError['comment'])){
                            ?>
                            <p class="text-danger"><?= $this->arrayError['comment']?></p>
                            <?php
                        }
                        ?>
                    </div>
                    <button type="submit" name="addComment" class="btn btn-success">Commenter !</button>
                </div>
            </form>
        <?php
        }
        if(isset($comments)){
            foreach($comments as $comment)
            {
                ?>
                    <div class="card my-2">
                    <div class="card-header">
                        <?= $comment->getIdUser(); ?>
                    </div>
                    <div class="card-body">
                        <figure>
                        <blockquote class="blockquote">
                            <p><?= $comment->getText(); ?></p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            <!-- si tu a une date de mùodification tu l'affiche sinon tu affiche la date de création -->
                            <?= $comment->getModificationDate() ? $comment->getModificationDate() : $comment->getCreationDate(); ?>
                        </figcaption>
                        </figure>
                        <?php if($_SESSION['user'] && $_SESSION['user']['id_user'] === $comment->getIdUser()){
                            ?>
                            <a class="btn btn-warning"  href="/modifCommentaire?id=<?= $comment->getIdComment() ?>">Modifier</a>
                            <?php
                        } ?>
                    </div>
                    </div>
                <?php
            }
        }
    ?>
</div>
<?php
require_once(__DIR__ . "/partials/footer.view.php");