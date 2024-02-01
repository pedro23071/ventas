<?php

    namespace app\controllers;

    use app\models\mainModel;

    class devolucionController extends mainModel{

        public function devolucionAllVenta(){
            $venta_code = $this->limpiarCadena(($_REQUEST["venta_code"] ?? ''));
            $datos = $this->ejecutarConsulta("SELECT * FROM venta WHERE venta_codigo='$venta_code'");

            if($datos->rowCount() <=  0){
                $alerta=[
                    "status" => false,
                    "tipo"=>"simple",
                    "titulo"=>"Ocurrió un error inesperado",
                    "texto"=>"No hemos podido encontrar la venta seleccionada",
                    "icono"=>"error"
                ];

                ncode($alerta);
                exit();
            }
            $venta = $datos->fetch();
            if(empty($venta)){
                $alerta=[
                    "status" => false,
                    "tipo"=>"simple",
                    "titulo"=>"Ocurrió un error inesperado",
                    "texto"=>"No hemos podido encontrar la venta seleccionada",
                    "icono"=>"error"
                ];
                return json_encode($alerta);
                exit();
            }

            $venta_code = $venta["venta_codigo"];
            $detalle_venta = $this->seleccionarDatos("Normal","venta_detalle WHERE venta_codigo='".$venta_code."'","*",0);

            if($detalle_venta->rowCount() <= 0 ){
                $alerta=[
                    "status" => false,
                    "tipo"=>"simple",
                    "titulo"=>"Ocurrió un error inesperado",
                    "texto"=>"No hemos podido encontrar los articulos de la venta seleccionada",
                    "icono"=>"error"
                ];
                return json_encode($alerta);
                exit();
            }

            $venta["items"] = $detalle_venta->fetchAll();
            if(empty($venta["items"])){
                $alerta=[
                    "status" => false,
                    "tipo"=>"simple",
                    "titulo"=>"Ocurrió un error inesperado",
                    "texto"=>"No hemos podido encontrar los articulos de la venta seleccionada",
                    "icono"=>"error"
                ];
                return json_encode($alerta);
                exit();
            }

            $venta_datos_up = [
                [
                    "campo_nombre"=>"venta_estatus",
                    "campo_marcador"=>":Estatus",
                    "campo_valor"=> 'devuelto'
                ]
            ];

            $condicion=[
                "condicion_campo"=>"venta_codigo",
                "condicion_marcador"=>":Codigo",
                "condicion_valor"=>$venta["venta_codigo"]
            ];

            if(!$this->actualizarDatos("venta", $venta_datos_up, $condicion)){
                $alerta=[
                    "status" => false,
                    "tipo"=>"simple",
                    "titulo"=>"Ocurrió un error inesperado",
                    "texto"=>"No hemos podido actualizar los datos de la venta ".$venta["venta_codigo"].", por favor intente nuevamente",
                    "icono"=>"error"
                ];

                return json_encode($alerta);
                exit();
            }

            foreach($venta["items"] as $producto){

                $datos_item = $this->ejecutarConsulta("SELECT * FROM producto WHERE producto_id='".$producto["producto_id"]."'");

                if($datos_item->rowCount() == 1){
                    $producto_en_db = $datos_item->fetch();
                    $qty = (int)$producto_en_db["producto_stock_total"] + (int)$producto['venta_detalle_cantidad'];

                    $datos_producto_rs = [
                        [
                            "campo_nombre" => "producto_stock_total",
                            "campo_marcador" => ":Stock",
                            "campo_valor" => $qty
                        ]
                    ];
                    $condicion = [
                        "condicion_campo"=>"producto_id",
                        "condicion_marcador"=>":ID",
                        "condicion_valor" => $producto['producto_id']
                    ];

                    $this->actualizarDatos("producto", $datos_producto_rs, $condicion);
                }

            }

            $datos_devolucion = [
                [
                    "campo_nombre"=>"venta_id",
                    "campo_marcador"=>":ID",
                    "campo_valor" => $venta["venta_id"]
                ],
                [
                    "campo_nombre"=>"venta_codigo",
                    "campo_marcador"=>":Codigo",
                    "campo_valor" => $venta["venta_codigo"]
                ],
                [
                    "campo_nombre"=>"devolucion_total",
                    "campo_marcador"=>":Total",
                    "campo_valor" => $venta["venta_total"]
                ],
                [
                    "campo_nombre"=>"devolucion_usuario_id",
                    "campo_marcador"=>":Usuario",
                    "campo_valor" => $_SESSION['id']
                ]
            ];
            /*== Agregando venta ==*/
            $agregar_devolucion = $this->guardarDatos("devolucion", $datos_devolucion);
            if($agregar_devolucion->rowCount() == 1){

                $datos_devolucion = $this->ejecutarConsulta("SELECT * FROM devolucion WHERE venta_codigo='".$venta["venta_codigo"]."'");
                if($datos_devolucion->rowCount() == 1){
                    $devolucion_en_db = $datos_devolucion->fetch();
                    foreach($venta["items"] as $producto){

                        $datos_devolucion_item = [
                            [
                                "campo_nombre"=>"devolucion_id",
                                "campo_marcador"=>":ID",
                                "campo_valor" => $devolucion_en_db["devolucion_id"]
                            ],
                            [
                                "campo_nombre"=>"producto_id",
                                "campo_marcador"=>":ID",
                                "campo_valor" => $producto['producto_id']
                            ],
                            [
                                "campo_nombre"=>"devolucion_producto_qty",
                                "campo_marcador"=>":Cantidad",
                                "campo_valor" => $producto['venta_detalle_cantidad']
                            ]
                        ];

                        $agregar_devolucion_items = $this->guardarDatos("devolucion_producto", $datos_devolucion_item);
                        if($agregar_devolucion_items->rowCount() <= 0 ){
                            $alerta=[
                                "status" => false,
                                "tipo"=>"limpiar",
                                "titulo"=>"No puedo agregar los productos",
                                "texto"=>"No puedo agregar los productos",
                                "icono"=>"success"
                            ];
                            return json_encode($alerta);
                            exit();
                        }
                    }


                    $alerta=[
                        "status" => true,
                        "tipo"=>"limpiar",
                        "titulo"=>"Devolucion registrada",
                        "texto"=>"La devolucion ". $venta['venta_codigo']." se registro con exito",
                        "icono"=>"success"
                    ];
                    return json_encode($alerta);
                    exit();


                }else{
                    $alerta=[
                        "status" => false,
                        "tipo"=>"limpiar",
                        "titulo"=>"No puedo obtener la devolucion",
                        "texto"=>"Error al obtener la debolucion y actualizar items",
                        "icono"=>"success"
                    ];
                    return json_encode($alerta);
                    exit();
                }
            }else{
                $alerta=[
                    "status" => false,
                    "tipo"=>"limpiar",
                    "titulo"=>"No se pudo obtener la devolucion",
                    "texto"=>"Error al Generar la devolucion",
                    "icono"=>"success"
                ];
                return json_encode($alerta);
                exit();
            }
        }


        public function eliminarDevolucionControlador(){

        }

        public function actualizarDevolucionControlador(){

        }

    }