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
        authHelper::checkLogged();
        $this->modelMarcas = new MarcasModel();
        $this->modelAutos = new AutosModel();
        $this->modelLogin = new LoginModel();
        $this->viewAdmin = new AdminView();
        $this->viewPublic = new PublicView();
    }

    // Muestra Fomrulario de carga de Marca
    public function formMarca(){
        $this->viewAdmin->formMarcaAdd();
    }

    // Guarda la nueva Marca
    public function addMarca(){
        if(empty($_POST['nombre'])){
            $this->viewAdmin->showError("No se completaron todos los datos");
        } else{
            $marca = $this->modelMarcas->getName($_POST['nombre']);
            if(!empty($marca)){
                $this->viewAdmin->showError("La marca ya existe");
            } else{
                $this->modelMarcas->insert($_POST['nombre']);
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
        if (empty($_POST['nombre'])) {
            $marca = $this->modelMarcas->getName($_POST['nombre']);
            $this->viewAdmin->showFormEditMarca($marca, "completar todos los campos");
        }
        else{
            $this->modelMarcas->update($_POST['nombre'], $_POST['id']);
            $marca = $this->modelMarcas->getName($_POST['nombre']);
            $this->viewAdmin->showFormEditMarca($marca, "los cambios se guardaron correctamente");
        }
    }

    // Elimina una Marca
    public function deleteMarca($id_Marca)
    {
        $this->modelMarcas->delete($id_Marca);
        header('Location: ' . BASE_URL . 'listaMarcas');
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
        $modelo_auto = $_POST["modeloAuto"];
        $tipo_auto = $_POST["tipo"];

        if(!empty($nombre_auto)&&!empty($id_marca)&&!empty($modelo_auto)&&!empty($tipo_auto)){
            
           $agregada = $this->modelAutos->addAuto($nombre_auto,$modelo_auto,$tipo_auto,$id_marca);
            if($agregada){

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
        $modelo_auto = $_POST["modeloAuto"];
        $tipo_auto = $_POST["tipo"];
        $id_auto=$_POST["id_auto"];
        if(!empty($nombre_auto)&&!empty($id_marca)&&!empty($modelo_auto)&&!empty($tipo_auto)&&!empty($id_auto)){
            
           $editada = $this->modelAutos->editAuto($nombre_auto,$modelo_auto,$tipo_auto,$id_marca,$id_auto);
            if($editada){

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
        $eliminada = $this->modelAutos->delete($id_auto);
        if($eliminada){

            header('Location: ' . BASE_URL . 'listaAutos');
        }else{

            $this->showError("ERROR! no se pudo eliminar el auto, intente nuevamente");
        }
    }
      
}