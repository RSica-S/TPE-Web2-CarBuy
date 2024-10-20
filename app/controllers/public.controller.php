<?php
require_once 'app/models/marcas.model.php';
require_once 'app/models/autos.model.php';
require_once 'app/views/public.view.php';
require_once 'helpers/auth.helper.php';

class PublicController{
    private $modelMarcas;
    private $modelAutos;
    private $viewPublic;
    private $auth;

    public function __construct()
    {
        $this->modelMarcas = new MarcasModel();
        $this->modelAutos = new AutosModel();
        $this->viewPublic = new PublicView();
        $this->auth = new AuthHelper();
    }

    // Muestra todas las Marcas 
    public function showMarcas(){
        $marcas = $this->modelMarcas->getAll();
        $this->viewPublic->showMarcas($marcas);
    }

    // Muetra los autos de una Marca
    public function showAutosByMarca($marca){
        $autosPorMarca = $this->modelAutos->getAutosByMarcas($marca);
        if(empty($autosPorMarca)){
            $this->viewPublic->showError("No tiene autos disponibles");
        }
        else{
            $this->viewPublic->autosByMarca($autosPorMarca);
        }
    }

    public function showError($msg){
        $this->viewPublic->showError($msg);
    }

    // Muestra los Autos
    public function showAutos(){

        $autos = $this->modelAutos->getAll();
        $this->viewPublic->showAutos($autos);
    }
    public function showAuto($id){
        $auto = $this->modelAutos->auto($id);
        $this->viewPublic->showAuto($auto);
    }
}