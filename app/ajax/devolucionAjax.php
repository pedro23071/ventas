<?php

    require_once "../../config/app.php";
    require_once "../views/inc/session_start.php";
    require_once "../../autoload.php";

    use app\controllers\devolucionController;

    if(isset($_REQUEST["action"])){

        $devolucion = new devolucionController();

        if($_REQUEST["action"] === "devolucionAllVenta"){
            echo $devolucion->devolucionAllVenta();
        }

        if($_REQUEST["action"] === "eliminar"){
            echo $devolucion->eliminarDevolucionControlador();
        }

        if($_REQUEST["action"] === "actualizar"){
            echo $devolucion->actualizarDevolucionControlador();
        }

    }else{
        session_destroy();
        header("Location: ".APP_URL."login/");
    }