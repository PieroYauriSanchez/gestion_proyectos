<?php include_once(__DIR__ . '/../__includes/__main_content_header.php'); ?>
<!-- <?php show($data);?> -->
<!-- MI CONTENIDO -->
<div class="col-sm-12 col-md-10 m-auto">
    <div class="card card-success mt-3">
        <div class="card-header text-center">
            <h4>PROYECTOS</h4>
        </div>
        <div class="card-body table-responsive">
            <form method="POST" onsubmit="validar()">
                <div class="row m-2">
                    <div class="form group col-sm-4">
                        <label>NOMBRE<span class="text-danger"></span></label>
                        <input type="text" id="NOMBRE_PROYECTO" name="NOMBRE_PROYECTO" class="form-control">
                        <span class="text-danger msg_error" id="nombre__error"><?= isset($data['errores']['nombre']) ? $data['errores']['nombre'] : '' ?></span>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="nombres">EQUIPO DESARROLLO<span class="text-danger"></span></label>
                        <Select id="COD_EQUIPO" name="COD_EQUIPO" class="form-control" > 
                            <option value="">SELECCIONAR</option>
                            <?php foreach ($data['listaequipo'] as $fila) { ?>
                                <option value="<?= $fila['COD_EQUIPO'] ?>"><?= $fila['DESCRIPCION'] ?>
                                </option>
                            <?php } ?>
                        </Select>
                        <span class="text-danger msg_error" id="equipo_desarrollo__error"><?= isset($data['errores']['equipo_desarrollo']) ? $data['errores']['equipo_desarrollo'] : '' ?></span>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="nombres">CLIENTE<span class="text-danger"></span></label>
                        <Select id="COD_CLIENTE" name ="COD_CLIENTE" class="form-control select2" > 
                            <option value="">SELECCIONAR</option>
                            <?php foreach ($data['listacliente'] as $fila) { ?>
                                <option value="<?= $fila['COD_CLIENTE'] ?>"><?= $fila['RAZON_SOCIAL'] ?>
                                </option>
                            <?php } ?>
                        </Select>
                        <span class="text-danger msg_error" id="id_area_usuaria__error"><?= isset($data['errores']['id_area_usuaria']) ? $data['errores']['id_area_usuaria'] : '' ?></span>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="nombres">DESCRIPCION<span class="text-danger"></span></label>
                        <textarea id="DESCRIPCION" name="DESCRIPCION" class="form-control" rows="3"></textarea>
                        <span class="text-danger msg_error" id="descripcion__error"><?= isset($data['errores']['descripcion']) ? $data['errores']['descripcion'] : '' ?></span>
                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-block btn-success" style="margin-top: 32px;">CREAR Y GUARDAR</button>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once(__DIR__ . '/../__includes/__main_content_footer.php'); ?>
