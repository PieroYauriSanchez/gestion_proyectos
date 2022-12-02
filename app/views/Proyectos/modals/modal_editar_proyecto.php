<!-- MODAL EDITAR ACTIVIDAD -->
<div class="modal fade" id="myModalEditarProyecto" role="dialog" aria-labelledby="myModalEditarProyecto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header bg-success text-center">
                    <h4 class="modal-title w-100">Editar Proyecto</h4>
                </div>
                <div class="modal-body row">
                    <input type="hidden" name="accion" value="AGREGAR_ACTIVIDAD">
                    <!-- ACTIVIDAD -->
                    <div class="form-group col-sm-12">
                        <label>NOMBRE <span class="text-danger">*</span></label>
                        <textarea required id="NOMBRE_PROYECTO" name="NOMBRE_PROYECTO" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>EQUIPO DESARROLLO <span class="text-danger">*</span></label>
                        <Select id="COD_EQUIPO" name="COD_EQUIPO" class="form-control"> 
                            <option value="">SELECCIONAR</option>
                            <?php foreach ($data['listaequipo'] as $fila) { ?>
                                <option value="<?= $fila['COD_EQUIPO'] ?>"><?= $fila['DESCRIPCION'] ?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="form-group col-sm-12">
                        <label>CLIENTE <span class="text-danger">*</span></label>
                        <Select id="COD_CLIENTE" name="COD_CLIENTE" class="form-control">
                            <option value="">SELECCIONAR</option>
                            <?php foreach ($data['listacliente'] as $fila) { ?>
                                <option value="<?= $fila['COD_CLIENTE'] ?>"><?= $fila['RAZON_SOCIAL'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>DESCRIPCION <span class="text-danger">*</span></label>
                        <textarea required id="DESCRIPCION" name="DESCRIPCION" class="form-control" rows="2"></textarea>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-info">GUARDAR</button>
                    <input type="hidden" name="accion" value="EDITAR_PROYECTO">
                    <input type="hidden" name="COD_PROYECTO" id="COD_PROYECTO">
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function CompletarDatosTarea(element) {
        let data = JSON.parse(element.getAttribute('data-datos'));
        // console.log(data);
        $('#NOMBRE_PROYECTO').val(data.NOMBRE_PROYECTO);
        $('#COD_EQUIPO').val(data.COD_EQUIPO);
        $('#COD_CLIENTE').val(data.COD_CLIENTE);
        $('#DESCRIPCION').val(data.DESCRIPCION);
        $('#COD_PROYECTO').val(data.COD_PROYECTO);
        // let fecha_requerimiento = (data.fecha_requerimiento == null)?'':data.fecha_requerimiento;
        // console.log(fecha_requerimiento);
    }
</script>