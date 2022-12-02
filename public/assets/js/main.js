function validar () {

    let continuar = true;

    event.preventDefault();

    let NOMBRE_PROYECTO = document.querySelector("#NOMBRE_PROYECTO").value;
        if(NOMBRE_PROYECTO=='') {
            alert('Ingrese el nombre de su proyecto');
            continuar = false;
        }

    let COD_EQUIPO = document.querySelector("#COD_EQUIPO").value;
        if(COD_EQUIPO=='') {
            alert('Seleccione uno de los campos');
            continuar = false;
        }

        let COD_CLIENTE = document.querySelector("#COD_CLIENTE").value;
        if(COD_CLIENTE=='') {
            alert('Seleccione uno de los campos');
            continuar = false;
        }
        
        let DESCRIPCION = document.querySelector("#DESCRIPCION").value;
        if(DESCRIPCION==''){
           alert('Ingrese la descripción del proyecto');
        }
    if (continuar == true) {
        event.currentTarget.submit();
    }
    
}
