<!-- MODAL EDITAR ACTIVIDAD -->
<div class="modal fade" id="myModalEditarActividad" role="dialog" aria-labelledby="myModalEditarActividad">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header bg-success text-center">
                    <h4 class="modal-title w-100">EDITAR ACTIVIDAD</h4>
                </div>
                <div class="modal-body row">
                    <input type="hidden" name="accion" value="EDITAR_ACTIVIDAD">
                    <!-- ACTIVIDAD -->
                    <div class="form-group col-sm-12">
                        <label>DESCRIPCION <span class="text-danger">*</span></label>
                        <textarea required id="DESC_ACTIVIDAD" name="DESC_ACTIVIDAD" class="form-control" rows="2"></textarea>
                    </div> 
                    <!-- FECHA INICIO -->
                    <div class="form-group col-sm-6">
                        <label>FECHA INICIO <span class="text-danger">*</span></label>
                        <input required id="FECHA_INICIO" type="date" name="FECHA_INICIO" class="form-control">
                    </div>
                    <!-- FECHA PRESENTACION -->
                    <div class="form-group col-sm-6">
                        <label>FECHA TERMINO <span class="text-danger">*</span></label>
                        <input required id="FECHA_TERMINO" type="date" name="FECHA_TERMINO" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-info">EDITAR</button>
                    <input type="hidden" name="accion" value="EDITAR_ACTIVIDAD">
                    <input type="hidden" name="COD_PROYECTO" id="COD_PROYECTO">
                    <input type ="hidden" name="COD_ACTIVIDAD" id="COD_ACTIVIDAD">
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function CompletarDatosTarea(element) {
        let data = JSON.parse(element.getAttribute('data-datos'));
        // console.log(data);
        $('#DESC_ACTIVIDAD').val(data.DESC_ACTIVIDAD);
        $('#FECHA_INICIO').val(data.FECHA_INICIO);
        $('#FECHA_TERMINO').val(data.FECHA_TERMINO);
        $('#COD_ACTIVIDAD').val(data.COD_ACTIVIDAD);
        // let fecha_requerimiento = (data.fecha_requerimiento == null)?'':data.fecha_requerimiento;
        // console.log(fecha_requerimiento);
    }
</script>