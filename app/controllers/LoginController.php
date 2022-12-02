<?php
class LoginController  extends Controller
{

    private $UsuarioModel;
    
    function __construct()
    {  
        if(isset($_SESSION['CODUSUARIO']) && strlen($_SESSION['CODUSUARIO']) > 0){
            header("Location: " . ROOT."principal");
        }
        $this->UsuarioModel = $this->loadModel("UsuarioModel");             
    }

    function index()
    {       
        $data = [];
        $data['errores'] = [];
        $data['objeto']['usuario'] = isset($_POST['usuario']) ? $_POST['usuario'] : "";
        $data['objeto']['contrasena'] = isset($_POST['contrasena']) ? $_POST['contrasena'] : "";
        $data['sesion_splash'] = false;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            // $encriptada = password_hash($data['objeto']['contrasena'], PASSWORD_DEFAULT);
            // echo 'La contraseña ingresada es: '.$data['objeto']['contrasena'];
            // echo '<br>';
            // echo 'La contraseña encriptada es: '.$encriptada;
            // echo '<br>';
            // if(password_verify( $data['objeto']['contrasena'],$encriptada)) {
            //     echo 'Son iguales';
            // }
            // die();

            if (strlen($data["objeto"]["usuario"]) <= 0) $data['errores']['usuario'] = "Ingrese su Usuario";
            if (strlen($data["objeto"]["contrasena"]) <= 0) $data['errores']['contrasena'] = "Ingrese su Contraseña";

            if (count($data['errores']) <= 0) {
                //Buscamos al usuario en la BD
                $busqueda = $this->UsuarioModel->buscar_usuario($data["objeto"]["usuario"]);
                
                if(count($busqueda)>0) {
                    
                    $contrasena_BD = $busqueda[0]['CONTRASENA'];
                    
                    if(password_verify($data['objeto']['contrasena'], $contrasena_BD)) {
                        $data['sesion_splash'] = true;
                        $_SESSION['NOMBRE_USUARIO'] = $busqueda[0]['NOMBRES'].' '.$busqueda[0]['APEPATERNO'];
                        $_SESSION['CODUSUARIO'] = $busqueda[0]['CODUSUARIO'];

                        echo '<meta http-equiv="refresh" content="3; url=./">'; 
                    } else {
                        echo $data['objeto']['contrasena'];
                        echo $contrasena_BD;
                        array_push($_SESSION["msg_wrong"], "Usuario y/o contraseña incorrectos.");
                    }
                } else {
                    array_push($_SESSION["msg_wrong"], "Usuario y/o contraseña incorrectos.");
                }
            }
        }
       $this->view("login/iniciarsesion", $data);
        
    } 

    function salir()
    {
        $_SESSION = array();
        header("Location: " . ROOT.'login');
    }
}
?>