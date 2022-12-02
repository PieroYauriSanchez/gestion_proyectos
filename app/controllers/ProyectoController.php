<?php 
class ProyectoController extends Controller
{
    private $ProyectoModel;
    private $CronogramaModel;

    function __construct() 
    {
        $this->ProyectoModel = $this->loadModel("ProyectoModel");
        $this->CronogramaModel = $this->loadModel("CronogramaModel");
        /*verificarAutentificacion();
        $this->UsuarioModel = $this->loadModel("UsuarioModel");
        //Recuperamos variables de sesión
		$this->global_id_usuario = $_SESSION['O_id_usuario'];*/
    }

    function index($id = "") 
    {
        if (strlen($id) == 0) {
            // LISTAMOS
            $this->listar();
        } else {    
            // INFORMACION
            if (is_numeric($id)) {
                $this->info($id);
            } else {
                $this->view("404.php");
            }
        }
    }

    function listar() 
    {
        $data = [];
        $data['INNOVATESC'] = "Proyectos";
        $data['listar'] = "";
        $data['Proyectos'] = $this->ProyectoModel->listar(); 
        $data['listacliente'] = $this->ProyectoModel->listar_cliente();
        $data['listaequipo'] = $this->ProyectoModel->listar_equipo();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Verificamos la acción a realizar
            if ($_POST['accion'] == 'EDITAR_PROYECTO'){
                $this->editar_proyecto($_POST);
            }
        }

        $this->view("Proyectos/listar", $data);
    }

    function crear() 
    {
        $data = [];
        $data['errores'] = [];
        $data['INNOVATESC'] = "Proyectos";
        $data['listacliente'] = $this->ProyectoModel->listar_cliente();
        $data['listaequipo'] = $this->ProyectoModel->listar_equipo();

        //Recuperamos los valores ingresados
        $data['objeto']['COD_CLIENTE']= isset($_POST['COD_CLIENTE']) ? $_POST['COD_CLIENTE'] : "";
        $data['objeto']['COD_EQUIPO']= isset($_POST['COD_EQUIPO']) ? $_POST['COD_EQUIPO'] : "";
        $data['objeto']['NOMBRE_PROYECTO']=isset($_POST['NOMBRE_PROYECTO']) ? $_POST['NOMBRE_PROYECTO'] : "";
        $data['objeto']['DESCRIPCION']= isset($_POST['DESCRIPCION']) ? $_POST['DESCRIPCION'] : "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rpta = $this->ProyectoModel->crear($data['objeto']);
            if ($rpta == true) {
                //Enviamos mensaje exitoso
                array_push($_SESSION["msg_success"], "El Proyecto ha sido creado y guardado con éxito");
                // rediccionamos para que se limpie los inputs
                header("Location: " . ROOT . "proyecto/crear");
                exit();
            } else {
                array_push($_SESSION["msg_wrong"], "Error en la creación, vuelva a intentarlo.");
            }
        }
        $this->view("Proyectos/crear", $data);
    }

    function info($id)
    {
        $data = [];
        $data['cronograma']  = $this->CronogramaModel->listar($id);
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['COD_PROYECTO'] = $id;
             //Verificamos la acción a realizar
            if ($_POST['accion'] == 'AGREGAR_ACTIVIDAD') {
                $this->agregar_actividad($_POST);
            } 
            if ($_POST['accion'] == 'EDITAR_ACTIVIDAD'){
                $this->editar_actividad($_POST);
            } 
            if ($_POST['accion'] == 'ELIMINAR_ACTIVIDAD'){
                $this->eliminar_actividad($_POST);
            } 
        } 
        $this->view("Proyectos/info", $data);
    }

    function editar_proyecto($data)
    { 
        $result = $this->ProyectoModel->editar_proyecto($data);
        if ($result) {
            array_push($_SESSION["msg_success"], "Proyecto editado correctamente.");
        } else {
            array_push($_SESSION["msg_wrong"], "Error al editar proyecto, contacte a Proveedor.");
        }
        header("Location: " . ROOT . "Proyecto");
        exit();
    }

    function editar_actividad($data)
    { 
        $result = $this->CronogramaModel->editar_actividad($data);
        if ($result) {
            array_push($_SESSION["msg_success"], "Actividad editada correctamente.");
        } else {
            array_push($_SESSION["msg_wrong"], "Error al editar actividad, contacte a Proveedor.");
        }
        header("Location: " . ROOT . "Proyecto/".$data['COD_PROYECTO']);
        exit();
    }

    function agregar_actividad($data)
    {
        $result = $this->ProyectoModel->agregar_actividad($data);
        if ($result) {
            array_push($_SESSION["msg_success"], "Actividad registrada correctamente.");
        } else {
            array_push($_SESSION["msg_wrong"], "Error al registrar la actidad, contacte a Proveedor.");
        }
        header("Location: " . ROOT . "Proyecto/".$data['COD_PROYECTO']);
        exit();
    }

    function eliminar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->ProyectoModel->eliminar_proyecto($id);            
            if ($result) {                              
                array_push($_SESSION["msg_success"], "Proyecto eliminado correctamente.");
            } else {
                array_push($_SESSION["msg_wrong"], "Error en eliminacion, contacte a Proveedor.");
            }   
        }    
        header("Location: " .ROOT."Proyecto");
        exit();    
    }

    function eliminar_actividad($data)
    {
        $result = $this->ProyectoModel->eliminar_actividad($data['COD_ACTIVIDAD']);            
        if ($result) {                              
            array_push($_SESSION["msg_success"], "Actividad eliminada correctamente.");
        } else {
            array_push($_SESSION["msg_wrong"], "Error en eliminacion, contacte a Proveedor.");
        }    
        header("Location: " .ROOT."Proyecto/".$data['COD_PROYECTO']);
        exit(); 
    }

    function correo($id)
    {
        $data = [];

        $busqueda = $this->ProyectoModel->detalle_proyecto($id);
        $cronograma = $this->CronogramaModel->listar($id);

        //Preparamos valores para el envio de correo
        $data['destinatario'] = $busqueda['CORREO_ELECTRONICO'];
        $data['nombre_destinatario'] = '2002010078@undc.edu.pe'; //$busqueda['REPRESENTANTE_LG'];
        $data['asunto'] = "Estatus proyecto - ".$busqueda['NOMBRE_PROYECTO'];
        $data['mensaje'] = "<p>Mediante el presente correo, queremos informarle el avance de las actividades del proyecto:</p>";

        foreach($cronograma as $tarea) {
            $data['mensaje'] = $data['mensaje'].'<p>'.$tarea['DESC_ACTIVIDAD'].': '.$tarea['AVANCE'].'% de avance.</p>';
        }

        //Llamamos a la funcion enviar correo
        $result = enviarCorreo($data);            
        if ($result) {                              
            array_push($_SESSION["msg_success"], "Correo enviado correctamente.");
        } else {
            array_push($_SESSION["msg_wrong"], "Error al enviar correo, contacte a Proveedor.");
        }  
  
        header("Location: " .ROOT."Proyecto");
        exit();    
    }
}
?>