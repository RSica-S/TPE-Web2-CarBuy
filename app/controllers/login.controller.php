<?php

require_once 'app/models/login.model.php';
require_once 'app/views/public.view.php';
require_once 'app/views/admin.view.php';
require_once 'helpers/auth.helper.php';


class LoginController
{
    private $modelLogin;
    private $viewAdmin;
    private $viewPublic;

    public function __construct()
    {
        $this->modelLogin = new LoginModel();
        $this->viewAdmin = new AdminView();
        $this->viewPublic = new PublicView();
    }

    
    public function login(){
        if(!empty($_POST)){
            $nombre_usuario= $_POST['username'];
            $contraseña= $_POST['contraseña'];            
        }
 
        $usuario = $this->modelLogin->getUser($nombre_usuario);
    
            if(!empty($usuario)&& password_verify($contraseña,$usuario->contraseña)){

                AuthHelper::login($usuario);
                header("location: " . BASE_URL . 'listaMarcas');
            }

    }

    // Cierra sesion y dirige al home
    public function logout()
    {
        if(session_status()!=PHP_SESSION_ACTIVE){
            session_start();
        }
        session_destroy();
        header('Location:' . BASE_URL . 'listaMarcas');
    }


    //verifica que tipo de usuario es
    public function formCheckIn()
    {
        $this->viewPublic->formCheck();
    }
}
