<?php

    namespace app\controllers;

    use app\models\mainModel;

    class devolucionController extends mainModel{

        public function devolucionAllVenta(){
            $venta_code = $_REQUEST["venta_code"];
            var_dump($venta_code);
            var_dump("test desade controlador");
            die();
        }


        public function eliminarDevolucionControlador(){

        }

        public function actualizarDevolucionControlador(){

        }

    }