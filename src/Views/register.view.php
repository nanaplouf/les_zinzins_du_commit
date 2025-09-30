<?php
require_once(__DIR__ . "/partials/head.view.php");
?>
<h1>Inscription</h1>
<form method="POST">
    <div class="container">
        <div class="form-group">
            <label for="pseudo" class="form-label">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="Toto" class="form-control">
            <?php 
            if(isset($arrayError['pseudo'])){
                ?>
                    <p class="text-danger"><?= $arrayError['pseudo']?></p>
                <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email :</label>
            <input type="email" name="email" id="email" placeholder="Toto@gmail.com" class="form-control">
            <?php 
            if(isset($arrayError['email'])){
                ?>
                    <p class="text-danger"><?= $arrayError['email']?></p>
                <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Mot de pase :</label>
            <input type="password" name="password" id="password" class="form-control">
            <?php 
            if(isset($arrayError['password'])){
                ?>
                    <p class="text-danger"><?= $arrayError['password']?></p>
                <?php
            }
            ?>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Parle moi de ton côté zinzin:</label>
            <textarea class="form-control" id="description" name="description" style="height: 100px"></textarea>
            <?php 
            if(isset($arrayError['description'])){
                ?>
                    <p class="text-danger"><?= $arrayError['description']?></p>
                <?php
            }
            ?>
        </div>
        <button type="submit" name="register" class="btn btn-success mt-5">Inscription</button>
    </div>
</form>
<?php
require_once(__DIR__ . "/partials/footer.view.php");