<?php
class CronogramaController  extends Controller
{

    private $cronogramaModel;

    function __construct() 
    {
        $this->conogramaModel = $this->loadModel("CronogramaModel");
    }
}
