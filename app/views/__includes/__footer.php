<footer class="main-footer">
  <strong>Copyright &copy; 2014-2021
    <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.1.0
  </div>
</footer>



</div>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= ASSETS ?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= ASSETS ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge("uibutton", $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="<?= ASSETS ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!--  AdminLTE -->
<script src="<?= ASSETS ?>/dist/js/adminlte.js"></script>

<!-- ICONOS -->
<script type="module" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.esm.js"></script>
<!-- <script nomodule="" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.js"></script> -->

<!-- SweetAlert2 -->
<script src="<?= ASSETS ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Select2 -->
<script src="<?= ASSETS ?>/plugins/select2/js/select2.full.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= ASSETS ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= ASSETS ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= ASSETS ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= ASSETS ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= ASSETS ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= ASSETS ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= ASSETS ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= ASSETS ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= ASSETS ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= ASSETS ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= ASSETS ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= ASSETS ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function() {
    $("#__dataTable").DataTable({
      pageLength : 8,
      "responsive": false,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["csv", "excel", "print"],
      "paging": true,
      "searching": true,
      "ordering": false,
      language: {
        "emptyTable": "Aún no hay registros",
        "info": "Mostrando página _PAGE_ de _PAGES_ de _TOTAL_ filas.",
        "infoEmpty": "",
        "infoFiltered": "",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Filtrar:",
        "zeroRecords": "No se encontró HT",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },
    }).buttons().container().appendTo('#__dataTable_wrapper .col-md-6:eq(0)');
  });

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
  });
  
</script>

<script>
// Ejecutar al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    // Buscar valor en localStorage, si no existe, poner en 'off'
    let darkMode = localStorage.getItem('darkMode') || 'off';
    // Obtener el checkbox
    let checkDark = document.querySelector('#customSwitch1');
    // Marcar checkbox y aplicar estilo a body si darkMode = 'on'
    if(darkMode == 'on') {
        checkDark.checked = true;
        document.body.classList.toggle('dark-mode');
    }
    // Escuchar cambios en checkbox
    checkDark.addEventListener('change', e => {
        // Cambiar estilo a body
        document.body.classList.toggle('dark-mode');
        // Actualizar variable de acuerdo a estado del checkbox
        darkMode = (checkDark.checked) ? 'on' : 'off';
        // Guardar variable en localStorage
        localStorage.setItem('darkMode', darkMode);
    });
});
</script>


<script>
  // CERRAR SESION
  document.querySelector("#cerrar_session").addEventListener("click", cerrar_session)

  function cerrar_session() {

    Swal.fire({
      title: `¿Seguro de Salir?`,
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#dc3545',
      cancelButtonColor: '#7180ae',
      confirmButtonText: 'Sí',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "<?= ROOT ?>login/salir";
      }
    })
  }
</script>

</body>

</html>