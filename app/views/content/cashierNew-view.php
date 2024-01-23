<?php require_once "marginAuto.php"; ?>

<div id="contenedor">
    <div class="container is-fluid mb-5" style="overflow: hidden; padding: 10px; background-color: rgba(204, 215 ,221,0.31); border-radius: 8px 8px 8px 8px">
    <p class="title"><i class="fas fa-cash-register fa-fw"></i> Cajas</p>
</div>

<div class="container pb-6 pt-6" style="overflow: hidden;">

<h2 class="subtitle "> Nueva caja</h2>
	<form class="FormularioAjax tableh" action="<?php echo APP_URL; ?>app/ajax/cajaAjax.php" method="POST" autocomplete="off" >

		<input type="hidden" name="modulo_caja" value="registrar">
        <i class="fas fa-clipboard-list fa-fw"></i>
        <!-- Accesos directos -->
        <span class="access-icons" style="position: absolute; top: 0; right: 0;">
                   <a href="<?php echo APP_URL; ?>cashierSearch/"> <i style="color: #424448" class="fas fa-search mr-2" title="Buscar"></i></a>
                   <a href="<?php echo APP_URL; ?>cashierNew/"><i style="color: #424448" class="fas fa-plus mr-2" title="Nueva"></i></a>
                   <a href="<?php echo APP_URL; ?>cashierList/"><i style="color: #424448" class="fas fa-clipboard-list mr-2" title="lista"></i></a>
				   <a href="<?php echo APP_URL; ?>dashboard/"><i  style="color: #424448" class="fas fa-home " title="Inicio"></i> </a> 
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
  
       
	</form>
	    
	<p class="has-text-centered pt-6">
            <small>Los campos <b>marcados</b> con <?php echo CAMPO_OBLIGATORIO; ?> son <b> obligatorios</b></small>
        </p>

    <?php include "./app/views/inc/btn_back.php";
    include 'navlateral.php';
    ?>
</div>
</div>

<?php
?>