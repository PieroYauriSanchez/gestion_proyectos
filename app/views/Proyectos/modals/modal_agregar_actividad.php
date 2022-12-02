<!-- MODAL AGREGAR ACTIVIDAD -->
<div class="modal fade" id="myModalAgregarActividad" role="dialog" aria-labelledby="myModalAgregarActividad">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header bg-success text-center">
                    <h4 class="modal-title w-100">AGREGAR ACTIVIDAD</h4>
                </div>
                <div class="modal-body row">
                    <input type="hidden" name="accion" value="AGREGAR_ACTIVIDAD">
                    <!-- ACTIVIDAD -->
                    <div class="form-group col-sm-12">
                        <label>DESCRIPCION <span class="text-danger">*</span></label>
                        <textarea required name="DESC_ACTIVIDAD" class="form-control" rows="2"></textarea>
                    </div> 
                    <!-- FECHA INICIO -->
                    <div class="form-group col-sm-6">
                        <label>FECHA INICIO <span class="text-danger">*</span></label>
                        <input required type="date" name="FECHA_INICIO" class="form-control" value="<?= date("Y-m-d");?>">
                    </div>
                    <!-- FECHA PRESENTACION -->
                    <div class="form-group col-sm-6">
                        <label>FECHA TERMINO <span class="text-danger">*</span></label>
                        <input required type="date" name="FECHA_TERMINO" class="form-control" value="<?= date("Y-m-d");?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-info">AGREGAR</button>
                </div>
            </form>
        </div>
    </div>
</div>