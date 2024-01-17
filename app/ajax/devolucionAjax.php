<?php

    require_once "../../config/app.php";
    require_once "../views/inc/session_start.php";
    require_once "../../autoload.php";

    use app\controllers\devolucionController;

    if(isset($_POST['modulo_producto'])){

        $devolucion = new devolucionController();

        if($_POST['modulo_producto'] === "registrar"){
            echo $devolucion->registrarDevolucionControlador();
        }

        if($_POST['modulo_producto'] === "eliminar"){
            echo $devolucion->eliminarDevolucionControlador();
        }

        if($_POST['modulo_producto'] === "actualizar"){
            echo $devolucion->actualizarDevolucionControlador();
        }

    }else{
        session_destroy();
        header("Location: ".APP_URL."login/");
    }