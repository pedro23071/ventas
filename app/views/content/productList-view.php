<?php require_once "marginAuto.php"; ?>
<div id="contenedor" style="max-width: 1800px">

<div class="container is-fluid mb-4">
	<h1 class="title">Productos</h1>
	<h2 class="subtitle"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de productos</h2>
    <?php   include "./app/views/inc/btn_back.php"; ?>
</div>

    <fieldset><legend><h2 class="subtitle"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de productos</h2></legend>
<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<?php
		use app\controllers\productController;

		$insProducto = new productController();

		echo $insProducto->listarProductoControlador($url[1],10,$url[0],"",0);

        ?>

</div>
        </fieldset>
</div>