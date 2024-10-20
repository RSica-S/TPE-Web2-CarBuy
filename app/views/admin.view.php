<?php

require_once 'libs/Smarty.class.php';
require_once 'app/views/base.view.php';

class AdminView extends BaseView{


    public function __construct()
    {
        parent::__construct();
      
    }

    // Formulario agregar Marca
    public function formMarcaAdd($error = null)
    {
        $this->getSmarty()->assign('error', $error);
        $this->getSmarty()->display('formMarcaAdd.tpl');
    }

    // Formulario para editar Marca
    public function showFormEditMarca($marca)
    {
        $this->getSmarty()->assign('marca', $marca);
        $this->getSmarty()->display('showFormEditMarca.tpl');
    }

    // Formulario para agregar Auto
    public function formAutoAdd($marcas,$error = null)
    {
        $this->getSmarty()->assign('error', $error);
        $this->getSmarty()->assign('marcas', $marcas);
        $this->getSmarty()->display('formAddAuto.tpl');
    }

    // Formulario para editar Auto
    public function formAutoEdit($auto,$marcas,$error = null)
    {
        $this->getSmarty()->assign('error', $error);
        $this->getSmarty()->assign('auto', $auto);
        $this->getSmarty()->assign('marcas', $marcas);
        $this->getSmarty()->display('formEditAuto.tpl');
    }
    // Error
    public function showError($msg)
    {
        $this->getSmarty()->assign('mensaje', $msg);
        $this->getSmarty()->display('error.tpl');
    }
}