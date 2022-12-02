<?php include_once(__DIR__ . '/../__includes/__main_content_header.php'); ?>

<!--CRONOGRAMA -->

<div class="card card-primary card-outline col-sm-12 p-0 m-auto">
    <!-- card-header -->
    <div class="card-header text-center">
        <div class="row justify-content-between">
            <div>
                <h4>CRONOGRAMA</h4>
            </div>
            <div><button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModalAgregarActividad">AGREGAR ACTIVIDAD</button></div>
        </div>
    </div>
    <!-- card-body-->
    <div class="card-body">
        <div class="table-responsive p-0">
            <table id="__dataTable" class="table table-head-fixed table-bordered text-nowrap text-center table_p">
                <thead>
                    <tr>
                        <th class="bg-success" style="width: 34%;">DESCRIPCION</th>
                        <th class="bg-success" style="width: 34%;">FECHA INICIO</th>
                        <th class="bg-success" style="width: 16%;">FECHA TERMINO</th>
                        <th class="bg-success" style="width: 16%;">AVANCE</th>
                        <th class="bg-success" style="width: 16%;">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['cronograma'] as $fila) { ?>
                        <tr>
                            <td style = "vertical-align: middle;"><?= $fila['DESC_ACTIVIDAD'] ?></td>
                            <td style = "vertical-align: middle;"><?= date_format(date_create($fila['FECHA_INICIO']),"d/m/Y"); ?></td>
                            <td style = "vertical-align: middle;"><?= date_format(date_create($fila['FECHA_TERMINO']),"d/m/Y"); ?></td>
                            <td style = "vertical-align: middle;"><?= $fila['AVANCE'] ?></td>
                            <td>
                                <div><button class="btn btn-success" data-datos='<?= json_encode(utf8ize($fila))?>' onclick="CompletarDatosTarea(this)" data-toggle="modal" data-target="#myModalEditarActividad"><ion-icon name="create-outline" ></ion-icon></button></div>
                                </a>
                                <form class="d-inline" method="POST">
                                    <input type="hidden" name="COD_ACTIVIDAD" value="<?= $fila['COD_ACTIVIDAD'] ?>">
                                    <input type="hidden" name="accion" value="ELIMINAR_ACTIVIDAD">
                                    <button type="submit" class="btn btn-danger btnDelete">
                                        <ion-icon name="trash"></ion-icon></a>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once(__DIR__ . '/../__includes/__main_content_footer.php'); ?>

<!-- MODAL AGREGAR ACTIVIDAD -->
<?php include_once(__DIR__ . '/modals/modal_agregar_actividad.php'); ?>

<!-- MODAL EDITAR ACTIVIDAD -->
<?php include_once(__DIR__ . '/modals/modal_editar_actividad.php'); ?>

<script>

    $(".btnDelete").click(function() {
        
        event.preventDefault();
        //const id = this.getAttribute('data-id')

        Swal.fire({
            title: `¿Seguro desea eliminar la actividad?`,
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