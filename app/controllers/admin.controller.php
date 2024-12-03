<?php

require_once 'app/models/marcas.model.php';
require_once 'app/models/autos.model.php';
require_once 'app/models/login.model.php';
require_once 'app/views/admin.view.php';
require_once 'app/views/public.view.php';
require_once 'helpers/auth.helper.php';

class AdminController{

    private $modelMarcas;
    private $modelAutos;
    private $modelLogin;
    private $viewAdmin;
    private $viewPublic;

    public function __construct()
    {
        $logged=authHelper::checkLogged();
        $this->modelMarcas = new MarcasModel();
        $this->modelAutos = new AutosModel();
        $this->modelLogin = new LoginModel();
        $this->viewAdmin = new AdminView();
        $this->viewPublic = new PublicView();
        if(!$logged){
            header('Location: '. BASE_URL .'showLogIn');
        }
    }

    // Muestra Fomrulario de carga de Marca
    public function formMarca(){
        $this->viewAdmin->formMarcaAdd();
    }

    // Guarda la nueva Marca
    public function addMarca(){

        $nombre = $_POST['nombre'];
        $logo = $_POST['logo'];
        if(empty($nombre) || empty($logo)){
            $this->viewAdmin->showError("No se completaron todos los datos");
        } else{
            $marca = $this->modelMarcas->getName($nombre);
            if(!empty($marca)){
                $this->viewAdmin->showError("La marca ya existe");
            } else{
                $this->modelMarcas->insert($nombre, $logo);
                header('Location: ' . BASE_URL . 'listaMarcas');
            }
        }
    }

    // Muestra formulario para editar una Marca
    public function editMarca($id_marca)
    {
        $marca = $this->modelMarcas->get($id_marca);
        $this->viewAdmin->showFormEditMarca($marca);
    }

    // Modifica Marca
    public function modifyMarca()
    {
        $nombre = $_POST['nombre'];
        $logo = $_POST['logo'];
        $id = $_POST['id'];
        if (empty($nombre) || empty($logo) || empty($id) ) {
            $this->showError("Debe completar todos los campos");
        }
        else{
            $editada = $this->modelMarcas->update($nombre, $logo, $id); 
            if (!$editada){
                $this->showError("No se pudo editar la marca, intente nuevamente");
            }
            else{
                header('Location: ' . BASE_URL . 'listaMarcas');
            }
        }
    }

    // Elimina una Marca
    public function deleteMarca($id_Marca)
    {   
        $tieneAutos = $this->modelAutos->getAutosByMarcas($id_Marca);
        if ($tieneAutos) {
            $this->showError("No se pudo eliminar la marca porque existen autos asociados");
        }
        else{
            $this->modelMarcas->delete($id_Marca);
            header('Location: ' . BASE_URL . 'listaMarcas');
        }
    }
    
    // Error
    public function showError($msg)
    {
        $this->viewAdmin->showError($msg);
    }

    // Muestra formulario de carga de Auto
    public function formAuto(){
        $marcas=$this->modelMarcas->getAll();
        $this->viewAdmin->formAutoAdd($marcas);
    }

    // Guarda el nuevo Auto
    public function addAuto(){
        $nombre_auto = $_POST["nombreAuto"];
        $id_marca = $_POST["idMarca"];
        $descripcion_auto = $_POST["descripcionAuto"];
        $precio_auto = $_POST["precio"];

        if(!empty($nombre_auto)&&!empty($id_marca)&&!empty($descripcion_auto)&&!empty($precio_auto)){
            
           $agregado = $this->modelAutos->addAuto($nombre_auto,$descripcion_auto,$precio_auto,$id_marca);
            if($agregado){

                header('Location: ' . BASE_URL . 'listaAutos');
            }else{

                $this->showError("ERROR! no se pudo agregar el auto, intente nuevamente");
            }
        }else{
            $this->showError("ERROR! quedaron campos vacios");
        }
    }

    // Muestra formulario para editar un Auto
    public function formEditAuto($id_auto){

        $auto = $this->modelAutos->auto($id_auto);
        $marcas=$this->modelMarcas->getAll();
        $this->viewAdmin->formAutoEdit($auto, $marcas);
    }

    // Edita el Auto
    public function editAuto(){

        $nombre_auto = $_POST["nombreAuto"];
        $id_marca = $_POST["idMarca"];
        $descripcion_auto = $_POST["descripcionAuto"];
        $precio_auto = $_POST["precio"];
        $id_auto=$_POST["id_auto"];
        if(!empty($nombre_auto)&&!empty($id_marca)&&!empty($descripcion_auto)&&!empty($precio_auto)&&!empty($id_auto)){
            
           $editado = $this->modelAutos->editAuto($nombre_auto,$descripcion_auto,$precio_auto,$id_marca,$id_auto);
            if($editado){

                header('Location: ' . BASE_URL . 'listaAutos');
            }else{

                $this->showError("ERROR! no se pudo editar el auto, intente nuevamente");
            }
        }else{
            $this->showError("ERROR! quedaron campos vacios");
        }

       
    }

    // Elimina el Auto
    public function deleteAuto($id_auto){
        $eliminado = $this->modelAutos->delete($id_auto);
        if($eliminado){

            header('Location: ' . BASE_URL . 'listaAutos');
        }else{

            $this->showError("ERROR! no se pudo eliminar el auto, intente nuevamente");
        }
    }
      
}