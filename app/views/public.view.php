<?php

require_once 'app/views/base.view.php';

class PublicView extends BaseView{

    public function __construct()
    {
        parent::__construct();
    }

    public function showError($msg)
    {
        $this->getSmarty()->assign('mensaje', $msg);
        $this->getSmarty()->display('templates/error.tpl');
    }

    // Muestra todas las Marcas
    public function showMarcas($marcas)
    {
        $this->getSmarty()->assign('listaMarcas', $marcas);
        $this->getSmarty()->display('showMarcas.tpl');
    }

    // Muestra todos los Autos de una Marca
    public function autosByMarca($autosPorMarca)
    {
        $this->getSmarty()->assign('autosPorMarca', $autosPorMarca);
        $this->getSmarty()->display('autosPorMarca.tpl');
    }

    // Muestra todos los Autos 
    public function showautos($autos){
        $this->getSmarty()->assign('listaAutos', $autos);
        $this->getSmarty()->display('showAutos.tpl');
    }

    // Muestra detalle del Auto
    public function showauto($auto){
        
        $this->getSmarty()->assign('auto', $auto);
        $this->getSmarty()->display('showAuto.tpl');
    }
}