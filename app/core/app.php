<?php

class App 
{
    private $controller = "login" ;
    private $method = "index" ;
    private $params = [] ;

    function __construct(){
        // [0] -> CONTROLLER
        // [1] -> METHOD 
        // [2], [3], [4] ........ / -> PARAMS

        // 1* EVALUAMOS Y FORMATEAMOS URL
        $url = $this->splitURL();
        
        // 2_1* EVALUAMOS SI EXISTE EL CONTROLADOR Y LO GUARDAMOS EN VARIABLE / DEFAULT HOME
        // show(ucfirst(strtolower($url[0])));
        if(file_exists(__DIR__."/../controllers/". ucfirst(strtolower($url[0])) ."Controller.php")){
            $_SESSION["url_controller"] = strtolower($url[0]); // ESTADO GLOBAL PARA GUARDAR EL URL Y JUGAR EL ASIDE - solo minúscula
            $this->controller = ucfirst(strtolower($url[0]))."Controller";            
            unset($url[0]); //delete the controller 
        }else{
            $_SESSION["url_controller"] = $this->controller; // ESTADO GLOBAL PARA GUARDAR EL URL Y JUGAR EL ASIDE
        }
        

        // 2_2* INSTANCIAMOS CRONTROLLER
        require __DIR__."/../controllers/".$this->controller.".php";
        $this->controller = new $this->controller;

        // 3* EVALUAMOS SI EXISTE EL METODO Y GUARDAMOS EN VARIABLE / DEFAULT INDEX()
        if(isset($url[1])){
                            // ( object , method )
            if(method_exists($this->controller, $url[1])){
                //ESTADO GLOBAL PARA GUARDAR EL URL Y JUGAR EL ASIDE 
                $_SESSION["url_method"] = $url[1];
                $this->method = $url[1];
                unset($url[1]); //delete the method 
            }           
        }else{
            //ESTADO GLOBAL PARA GUARDAR EL URL Y JUGAR EL ASIDE 
            $_SESSION["url_method"] = $this->method;
        }   
        

        // 4* OBTIENE LOS DATOS RESTANTE DEL ARRAY Y LOS GUARDA EN UNA VARIABLE
        $this->params = array_values($url); 
       
        // 5* RUN CLASS AND METHOD
        call_user_func_array( [$this->controller, $this->method] , $this->params );
    }

    private function splitURL(){
        // [0] -> CONTROLLER
        // [1] -> METHOD 
        // [2], [3], [4] ........ / -> PARAMS

        // 1* Verificamos que exista URL
        $url = isset($_GET['url']) ? $_GET['url'] : "login"; 
        // 2* Limpiamos "/" en caso inserte más de uno.
        $clearUrl = filter_var(trim($url, "/"), FILTER_SANITIZE_URL);
        // 3* lo mandamos en array diviendo por "/" 
        return explode("/", $clearUrl);
    }
    
}
