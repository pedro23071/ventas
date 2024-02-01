<?php require_once "marginAuto.php"; ?>
<div id="contenedor" style="max-width: 1800px">
    <div class="container is-fluid mb-6">
        <h1 class="title">Devoluciones</h1>
        <h2 class="subtitle"><i class="fas fa-people-carry fa-fw"></i> &nbsp; Lista de Devoluciones</h2>
    </div>

    <div id="contenedor">
        <div class="container pb-6 pt-6">

            <div class="form-rest mb-6 mt-6"></div>

            <?php
                use app\controllers\devolucionController;

                $devolController = new devolucionController();

                $devolList =  $devolController->getdevoluciones();

                echo '<pre>';
                print_r($devolList);
                echo '</pre>';

                include "./app/views/inc/print_invoice_script.php";
            ?>
        </div>
    </div>
</div>