<?php
class PrincipalController extends Controller
{
    //private $empresaModel;

    function __construct() {
        
        //verificarLogin();
        //$this->empresaModel = $this->loadModel("EmpresaModel");
    }

    function index() {

        $data = [];
        $data['pagina_titulo'] = "Principal"; 

        $this->view("principal", $data);
    }

}

?>
