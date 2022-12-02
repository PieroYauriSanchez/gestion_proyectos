
<?php if (isset($_SESSION["msg_wrong"]) && count($_SESSION["msg_wrong"]) > 0) { ?>
    <div class="w-100 row">
        <div class="col-lg-11 m-auto">
            <div class="alert alert-danger" role="alert">
            <?php foreach ($_SESSION["msg_wrong"] as $fila) { ?>
                <p class=" mb-0">* <?= $fila ?></p>                 
            <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isset($_SESSION["msg_success"]) && count($_SESSION["msg_success"]) > 0) { ?>
    <div class="w-100 row">
        <div class="col-lg-11 m-auto">
            <div class="alert alert-success" role="alert">
            <?php foreach ($_SESSION["msg_success"] as $fila) { ?>
                <p class=" mb-0">* <?= $fila ?></p>                 
            <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
