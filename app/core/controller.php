<?php

Class Controller
{
    protected function view($view, $data = [])
    {        
        if(file_exists(__DIR__."/../views/". $view .".php")){
            include __DIR__."/../views/". $view .".php";
        }else{
            include __DIR__."/../views/404.php";
        }
    }

    protected function loadModel($model)
    {        
        if(file_exists(__DIR__."/../models/". $model .".php")){
            include __DIR__."/../models/". $model .".php";
            return $model = new $model();
        }
        return false;
    }
}