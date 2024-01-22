<div id="contenedor">
<div class="container is-fluid mb-6"  style="overflow: hidden;">
    <a  href="<?php echo APP_URL; ?>dashboard/">
        <span data-title="Inicio" class="tooltip">
        <i style="color: #424448" class="fas fa-home"></i></a>
    <h1 class="title">Cajas</h1>
    <h2 class="subtitle"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Cajas</h2>

</div>


<div class="container pb-6 pt-6"  style="overflow: hidden;"><span style="visibility: hidden">p</span>
     <span class="access-icons forzatooltip " style="position: absolute; top: 0; right: 0;">
                   <a style="color:#FFFFFF;" href="<?php echo APP_URL; ?>cashierSearch/"> <span data-title="Buscar" class="tooltip"><i class="fas fa-search mr-2" ></i></a>&nbsp;
                   <a  style="color:#FFFFFF;" href="<?php echo APP_URL; ?>cashierNew/"><span data-title="Nueva" class="tooltip"><i class="fas fa-plus mr-2" ></i></a>&nbsp;
                   <a  style="color:#FFFFFF;" href="<?php echo APP_URL; ?>cashierList/"><span data-title="Lista" class="tooltip"><i  class="fas fa-clipboard-list mr-2 "></i></a>&nbsp;
                   <a  style="color:#FFFFFF;" href="<?php echo APP_URL; ?>dashboard/"><span data-title="Inicio" class="tooltip"><i  class="fas fa-home mr-2 " title="Inicio"></i> </a> &nbsp;

                   
                </span>

    <?php
    
        use app\controllers\cashierController;
        $insCaja = new cashierController();

        if(!isset($_SESSION[$url[0]]) && empty($_SESSION[$url[0]])){
    ?>

    <div class="columns">

        <div class="column">


            <form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/buscadorAjax.php" method="POST" autocomplete="off" >
                <input type="hidden" name="modulo_buscador" value="buscar">
                <input type="hidden" name="modulo_url" value="<?php echo $url[0]; ?>">
                <div class="field is-grouped">
                    <p class="control is-expanded">
                        <input class="input is-rounded" type="text" name="txt_buscador" placeholder="¿Qué estas buscando?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30" required >
                    </p>
                    <p class="control">
                        <button class="button is-info" type="submit" >Buscar</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <?php }else{ ?>
    <div class="columns">
        <div class="column">
            <form class="has-text-centered mt-4 mb-4 FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/buscadorAjax.php" method="POST" autocomplete="off" >
                <input type="hidden" name="modulo_buscador" value="eliminar">
                <input type="hidden" name="modulo_url" value="<?php echo $url[0]; ?>">
                <fieldset>

                <p><i class="fas fa-search fa-fw"></i> &nbsp; Estas buscando <strong>“<?php echo $_SESSION[$url[0]]; ?>”</strong></p>

                    </fieldset>
                    <br>
                <button type="submit" class="button is-danger is-rounded"><i class="fas fa-trash-restore"></i> &nbsp; Eliminar busqueda</button>
            </form>
        </div>
    </div>
    <?php
            echo $insCaja->listarCajaControlador($url[1],15,$url[0],$_SESSION[$url[0]]);
        }
    ?>
</div>
    <?php
    include "./app/views/inc/btn_back.php";
    include 'navlateral.php';
    ?>
</div>
</div>




