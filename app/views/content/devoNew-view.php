<div class="container is-fluid mb-6">
    <h1 class="title">Devolucion</h1>
    <h2 class="subtitle"><i class="fas fa-cash-register fa-fw"></i> &nbsp; Nueva devolucion</h2>
</div>

<div class="container pb-6 pt-6">
    <?php

        include "./app/views/inc/btn_back.php";

        $code=$insLogin->limpiarCadena($url[1]);

        $datos=$insLogin->seleccionarDatos("Normal","venta INNER JOIN cliente ON venta.cliente_id=cliente.cliente_id INNER JOIN usuario ON venta.usuario_id=usuario.usuario_id INNER JOIN caja ON venta.caja_id=caja.caja_id WHERE (venta_codigo='".$code."')","*",0);

        if($datos->rowCount()==1){
            $datos_venta=$datos->fetch();
            ?>
            <h2 class="title has-text-centered">Datos de la venta <?php echo " (".$code.")"; ?></h2>
            <div class="columns pb-6 pt-6">
                <div class="column">

                    <div class="full-width sale-details text-condensedLight">
                        <div class="has-text-weight-bold">Fecha</div>
                        <span class="has-text-link"><?php echo date("d-m-Y", strtotime($datos_venta['venta_fecha']))." ".$datos_venta['venta_hora']; ?></span>
                    </div>

                    <div class="full-width sale-details text-condensedLight">
                        <div class="has-text-weight-bold">Nro. de factura</div>
                        <span class="has-text-link"><?php echo $datos_venta['venta_id']; ?></span>
                    </div>

                    <div class="full-width sale-details text-condensedLight">
                        <div class="has-text-weight-bold">Código de venta</div>
                        <span class="has-text-link"><?php echo $datos_venta['venta_codigo']; ?></span>
                    </div>

                </div>

                <div class="column">

                    <div class="full-width sale-details text-condensedLight">
                        <div class="has-text-weight-bold">Caja</div>
                        <span class="has-text-link">Nro. <?php echo $datos_venta['caja_numero']." (".$datos_venta['caja_nombre']; ?>)</span>
                    </div>

                    <div class="full-width sale-details text-condensedLight">
                        <div class="has-text-weight-bold">Vendedor</div>
                        <span class="has-text-link"><?php echo $datos_venta['usuario_nombre']." ".$datos_venta['usuario_apellido']; ?></span>
                    </div>

                    <div class="full-width sale-details text-condensedLight">
                        <div class="has-text-weight-bold">Cliente</div>
                        <span class="has-text-link"><?php echo $datos_venta['cliente_nombre']." ".$datos_venta['cliente_apellido']; ?></span>
                    </div>

                </div>

                <div class="column">

                    <div class="full-width sale-details text-condensedLight">
                        <div class="has-text-weight-bold">Total</div>
                        <span class="has-text-link"><?php echo MONEDA_SIMBOLO.number_format($datos_venta['venta_total'],MONEDA_DECIMALES,MONEDA_SEPARADOR_DECIMAL,MONEDA_SEPARADOR_MILLAR).' '.MONEDA_NOMBRE; ?></span>
                    </div>

                    <div class="full-width sale-details text-condensedLight">
                        <div class="has-text-weight-bold">Pagado</div>
                        <span class="has-text-link"><?php echo MONEDA_SIMBOLO.number_format($datos_venta['venta_pagado'],MONEDA_DECIMALES,MONEDA_SEPARADOR_DECIMAL,MONEDA_SEPARADOR_MILLAR).' '.MONEDA_NOMBRE; ?></span>
                    </div>

                    <div class="full-width sale-details text-condensedLight">
                        <div class="has-text-weight-bold">Cambio</div>
                        <span class="has-text-link"><?php echo MONEDA_SIMBOLO.number_format($datos_venta['venta_cambio'],MONEDA_DECIMALES,MONEDA_SEPARADOR_DECIMAL,MONEDA_SEPARADOR_MILLAR).' '.MONEDA_NOMBRE; ?></span>
                    </div>

                </div>

            </div>

            <div class="columns pb-6 pt-6">
                <div class="column">
                    <div class="table-container">
                        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                            <thead>
                            <tr>
                                <th class="has-text-centered">#</th>
                                <th class="has-text-centered">Producto</th>
                                <th class="has-text-centered">Cant.</th>
                                <th class="has-text-centered">Precio</th>
                                <th class="has-text-centered">Subtotal</th>
                                <th class="has-text-centered">Devolucion</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $detalle_venta=$insLogin->seleccionarDatos("Normal","venta_detalle WHERE venta_codigo='".$datos_venta['venta_codigo']."'","*",0);

                                if($detalle_venta->rowCount()>=1){

                                    $detalle_venta=$detalle_venta->fetchAll();
                                    $cc=1;

                                    foreach($detalle_venta as $detalle){
                                        ?>
                                        <tr class="has-text-centered" >
                                            <td><?php echo $cc; ?></td>
                                            <td><?php echo $detalle['venta_detalle_descripcion']; ?></td>
                                            <td><?php echo $detalle['venta_detalle_cantidad']; ?></td>
                                            <td><?php echo MONEDA_SIMBOLO.number_format($detalle['venta_detalle_precio_venta'],MONEDA_DECIMALES,MONEDA_SEPARADOR_DECIMAL,MONEDA_SEPARADOR_MILLAR)." ".MONEDA_NOMBRE; ?></td>
                                            <td><?php echo MONEDA_SIMBOLO.number_format($detalle['venta_detalle_total'],MONEDA_DECIMALES,MONEDA_SEPARADOR_DECIMAL,MONEDA_SEPARADOR_MILLAR)." ".MONEDA_NOMBRE; ?></td>
                                            <td>
                                                <button>
                                                    generar devolucion
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                        $cc++;
                                    }
                                    ?>
                                    <tr class="has-text-centered" >
                                        <td colspan="3"></td>
                                        <td class="has-text-weight-bold">
                                            TOTAL
                                        </td>
                                        <td class="has-text-weight-bold">
                                            <?php echo MONEDA_SIMBOLO.number_format($datos_venta['venta_total'],MONEDA_DECIMALES,MONEDA_SEPARADOR_DECIMAL,MONEDA_SEPARADOR_MILLAR)." ".MONEDA_NOMBRE; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }else{
                                    ?>
                                    <tr class="has-text-centered" >
                                        <td colspan="8">
                                            No hay productos agregados
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="columns pb-6 pt-6">
                <p class="has-text-centered full-width">
                    <?php
                        echo '<button type="button" class="button is-link is-light is-medium" onclick="devolucio_de_venta(\''.$datos_venta['venta_codigo'].'\')" title="Cancelar venta '.$datos_venta['venta_id'].'" ><i class="fas fa-people-carry fa-fw"></i> &nbsp; Cancelar Venta Completa</button>';
                    ?>
                </p>
            </div>
            <?php
            include "./app/views/inc/print_invoice_script.php";
        }else{
            include "./app/views/inc/error_alert.php";
        }
    ?>
</div>

<script>
    function devolucio_de_venta(venta_codigo){
        fetch(`<?php echo APP_URL ?>app/ajax/devolucionAjax.php?action=devolucionAllVenta&venta_code=${venta_codigo}`)
            .then(response => {
                if (!response.status) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Respuesta correcta:', data.success());
                debugger
            })
            .catch(error => {
                console.error('Fetch error:', error);
            });

    }
</script>