<?php
class NosotrosController extends Controller
{

    function index()
    {
        $data['page_title'] = "Nosotros";      
        $this->view("nosotros", $data);
    }

   
}
