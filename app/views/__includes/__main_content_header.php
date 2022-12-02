<?php include_once(__DIR__ . '/__header.php'); ?>

<?php include_once(__DIR__ . '/__nav.php'); ?>

<?php include_once(__DIR__ . '/__aside.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
         <?php if(isset($data['pagina_titulo'])){ ?>
            <h1 class="m-0"><?= $data['pagina_titulo'] ?></h1>
          <?php }?>
        </div>
      </div>
    </div>
    <!-- /.container-->
  </div>

  <?php include_once(__DIR__ . '/__alert.php'); ?>

   <!-- /.CONTENIDO PRINCIPAL -->
  <section class="content">
    <div class="container">
     