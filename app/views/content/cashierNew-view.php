
<div id="contenedor">


<div class="container is-fluid mb-6" style="overflow: hidden;">
    <a  href="<?php echo APP_URL; ?>dashboard/">
        <span data-title="actualizar caja" class="tooltip">
        <i class="fas fa-home"></i></a><h1 class="title">Cajas</h1>
	<h2 class="subtitle has-text-centered"><i class="fas fa-cash-register fa-fw"></i> &nbsp; Nueva caja</h2>
</div>

<div class="container pb-6 pt-6" style="overflow: hidden;">


	<form class="FormularioAjax tableh" action="<?php echo APP_URL; ?>app/ajax/cajaAjax.php" method="POST" autocomplete="off" >

		<input type="hidden" name="modulo_caja" value="registrar">
        <i class="fas fa-clipboard-list fa-fw"></i>
        <!-- Accesos directos -->
        <span class="access-icons" style="position: absolute; top: 0; right: 0;">
                   <a href="<?php echo APP_URL; ?>cashierSearch/"> <i class="fas fa-search mr-2" title="Buscar"></i></a>
                   <a href="<?php echo APP_URL; ?>cashierNew/"><i class="fas fa-plus mr-2" title="Nueva"></i></a>
                   <a href="<?php echo APP_URL; ?>cashierList/"><i class="fas fa-clipboard-list mr-2" title="lista"></i></a>
                </span>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Numero de caja <?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="caja_numero" pattern="[0-9]{1,5}" maxlength="5" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Nombre o código de caja <?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="caja_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ:# ]{3,70}" maxlength="70" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Efectivo en caja <?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="caja_efectivo" pattern="[0-9.]{1,25}" maxlength="25" value="0.00" required >
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">


			<button type="reset" class="button is-link is-light is-rounded"><i class="fas fa-paint-roller"></i> &nbsp; Limpiar</button>
			<button type="submit" class="button is-info is-rounded"><i class="far fa-save"></i> &nbsp; Guardar</button>

       </p>
        <fieldset>
		<p class="has-text-centered pt-6">
            <small>Los campos marcados con <?php echo CAMPO_OBLIGATORIO; ?> son obligatorios</small>
        </p>
        </fieldset>
	</form>

    <?php include "./app/views/inc/btn_back.php";?>

</div>

</div>

<?php
include 'navlateral.php';
?>