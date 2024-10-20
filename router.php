<?php

require_once 'app/controllers/public.controller.php';
require_once 'app/controllers/login.controller.php';
require_once 'app/controllers/admin.controller.php';

// Define la BASE URL de forma dinamica
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// Define accion
if (empty($_GET['action'])) {
    $_GET['action'] = 'listaMarcas';
}
$accion = $_GET['action'];

$parametros = explode('/', $accion);

switch ($parametros[0]) {

    // Acciones Publicas
    case 'listaAutos':
        $controller = new PublicController();
        $controller -> showAutos();
        break;
    
    case 'mostrarAuto':
        $controller = new PublicController();
        $controller->showAuto($parametros[1]);
        break;


    case 'listaMarcas':
        $controller = new PublicController();
        $controller->showMarcas();
        break;

    case 'autosPorMarca':
        $controller = new PublicController();
        $controller->showAutosByMarca($parametros[1]);
        break;

        // Acciones LogIn
    case 'suscribirse':
        $controller = new LoginController();
        $controller->formCheckIn();
        break;

    case 'guardar_usuario':
        $controller = new LoginController();
        $controller->addUser();
        break;

    case 'abrir_sesion':
        $controller = new LoginController();
        $controller->login();
        break;

    case 'cerrar_sesion':
        $controller = new LoginController();
        $controller->logout();
        break;

        // Acciones Admin
    case 'agregarMarca':
        $controller = new AdminController();
        $controller->formMarca();
        break;
    case 'guardarMarca':
        $controller = new AdminController();
        $controller->addMarca();
        break;
    case 'editarMarca':
        $controller = new AdminController();
        $controller->editMarca($parametros[1]);
        break;
    case 'guardarEditMarca':
        $controller = new AdminController();
        $controller->modifyMarca();
        break;
    case 'eliminarMarca':
        $controller = new AdminController();
        $controller->deleteMarca($parametros[1]);
        break;

    case 'agregarAuto':
        $controller = new AdminController();
        $controller->formAuto();
        break;

    case 'guardarAuto':
        $controller = new AdminController();
        $controller->addAuto();
        break;
        
    case 'editarAuto':
        $controller = new AdminController();
        $controller->formEditAuto($parametros[1]);
        break;
    
    case 'guardarEditAuto':
        $controller = new AdminController();
        $controller->editAuto();
        break;

    case 'eliminarAuto':
        $controller = new AdminController();
        $controller->deleteAuto($parametros[1]);
        break;

    default:
        $controller = new PublicController();
        $controller->showError("Se ha producido un error, vuelva a intentarlo mas tarde");
        break;
}
