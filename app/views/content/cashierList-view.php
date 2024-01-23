
<div class="container is-fluid mb-6" id="contenedor" >
    <a  href="<?php echo APP_URL; ?>dashboard/"><span data-title="Inicio" class="tooltip"><i style="color: #424448" class="fas fa-home"></i></a><h1 class="title">Cajas</h1>
	<h2 class="subtitle has-text-centered"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de cajas</h2>

<div class="container pb-6 pt-6" >
    <div>
        <fieldset>
            <legend>
                <i class="fas fa-clipboard-list fa-fw"></i>
                <!-- Accesos directos -->
                <span  class="access-icons" style="position: absolute; top: 0; right: 0; color:#424448">
                   <a href="<?php echo APP_URL; ?>cashierSearch/"> <i style="color:#424448" class="fas fa-search mr-2" title="Buscar"></i></a>
                   <a href="<?php echo APP_URL; ?>cashierNew/"><i style="color:#424448" class="fas fa-plus mr-2" title="Nueva"></i></a>
                   <a href="<?php echo APP_URL; ?>dashboard/"><i  style="color: #424448" class="fas fa-home " title="Inicio"></i> </a> 
                </span>
            </legend>

	<div class="form-rest mb-6 mt-6"></div>

	<?php
		use app\controllers\cashierController;

		$insCaja = new cashierController();

		echo $insCaja->listarCajaControlador($url[1],15,$url[0],"");
	?>

        </fieldset>

    </div>
</div>
    <?php
    include "./app/views/inc/btn_back.php";
    include 'navlateral.php';
    ?>


</div>
