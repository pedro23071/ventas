<?php require_once "marginAuto.php"; ?>
<div id="contenedor">
<div class="container is-fluid mb-4">
	<h1 class="title">Clientes</h1>

</div>
    <?php  include "./app/views/inc/btn_back.php"; ?>
    <fieldset><legend><h2 class="subtitle"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de clientes</h2></legend>
<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<?php
		use app\controllers\clientController;

		$insCliente = new clientController();

		echo $insCliente->listarClienteControlador($url[1],15,$url[0],"");
	?>
</div>
</div>
</fieldset>