<?php include_once(__DIR__ . '/../__includes/__main_content_header.php'); ?>
<!--<?php show($data); ?>-->

<!-- MI CONTENIDO -->
<div class="col-lg-12 m-auto">
    <div class="card card-primary card-outline mt-4">
        <div class="card-header text-center">
            <h4>RELACIÓN DE PROYECTOS</h4>
        </div>
        <div class="card-body table-responsive">
            <table id="__dataTable" class="table tableR table-head-fixed table-bordered text-center">
                <thead>
                    <tr>
                        <th class="bg-success">NOMBRE</th>
                        <th class="bg-success">EQUIPO DESARROLLO</th>
                        <th class="bg-success">CLIENTE</th>
                        <th class="bg-success">DESCRIPCION</th>
                        <th class="bg-success" style="width: 200px;">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data["Proyectos"] as $fila) { ?>
                        <tr>
                            <td><?= $fila['NOMBRE_PROYECTO'] ?></td>
                            <td><?= $fila['EQUIPO_DESARROLLO'] ?></td>
                            <td><?= $fila['RAZON_SOCIAL'] ?></td>
                            <td><?= $fila['DESCRIPCION'] ?></td>
                            <td>
                                <a href="<?= ROOT ?>Proyecto/<?= $fila['COD_PROYECTO'] ?>" class="btn  btn-info">
                                    <ion-icon name="add-outline"></ion-icon>
                                </a>
                                <button class="btn btn-success" data-datos='<?= json_encode(utf8ize($fila))?>' onclick="CompletarDatosTarea(this)" data-toggle="modal" data-target="#myModalEditarProyecto"><ion-icon name="create-outline" ></ion-icon></button>
                                <form class="d-inline" method="POST" action="<?= ROOT ?>Proyecto/eliminar/<?= $fila['COD_PROYECTO'] ?>">
                                    <button type="submit" class="btn btn-danger btnDelete" title="Eliminar">
                                        <ion-icon name="trash"></ion-icon>
                                    </button>
                                </form>
                                <a href="<?= ROOT ?>Proyecto/correo/<?= $fila['COD_PROYECTO'] ?>" class="btn btn-warning">
                                    <ion-icon name="mail"></ion-icon>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once(__DIR__ . '/../__includes/__main_content_footer.php'); ?>

<!-- MODAL EDITAR PROYECTO -->
<?php include_once(__DIR__ . '/modals/modal_editar_proyecto.php'); ?>

<script>

    $(".btnDelete").click(function() {
        
        event.preventDefault();
        //const id = this.getAttribute('data-id')

        Swal.fire({
            title: `¿Seguro desea eliminar el Proyecto?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {            
                this.parentNode.submit(); 
            }
        })

    });

</script>