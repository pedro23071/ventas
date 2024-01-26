<?php require_once "marginAuto.php"; ?>
<div id="contenedor" style="max-width: 1800px">

<div class="container is-fluid mb-2">
	<h1 class="title">Productos</h1>

</div>
<?php  include "./app/views/inc/btn_back.php"; ?>


    <fieldset style="border: 1px solid #b3daf6"><legend><h2 class="subtitle"><i class="fas fa-boxes fa-fw"></i> &nbsp; Productos por categoría</h2></legend>

<div class="container pb-6 pt-6">
    <?php
        use app\controllers\productController;
        $insProducto = new productController();
    ?>
    <div class="columns">

        <div class="column is-one-third" style="border: solid 1px #b2d9f5; background-color: #6e8791;  border-radius: 8px 8px 8px 8px; ">
            <h2 style="background-color: #cbd6dc; border-radius: 8px 8px 8px 8px; color:#fff;"  class="title has-text-centered">Categorías</h2>
            <?php

                $datos_categorias=$insProducto->seleccionarDatos("Normal","categoria","*",0);

                if($datos_categorias->rowCount()>0){
                    $datos_categorias=$datos_categorias->fetchAll();
                    foreach($datos_categorias as $row){
                        echo '<a href="'.APP_URL.$url[0].'/'.$row['categoria_id'].'/" class="button is-link is-inverted is-fullwidth">'.$row['categoria_nombre'].'</a>';
                    }
                }else{
                    echo '<p class="has-text-centered" >No hay categorías registradas</p>';
                }
            ?>
        </div>

        <div id="contenedor">
            <fieldset>
        <div class="column pb-6">
            <?php
                $categoria_id=(isset($url[1])) ? $url[1] : 0;

                $categoria=$insProducto->seleccionarDatos("Unico","categoria","categoria_id",$categoria_id);
                if($categoria->rowCount()>0){

                    $categoria=$categoria->fetch();

                    echo '
                        <h2 class="title has-text-centered">'.$categoria['categoria_nombre'].'</h2>
                        <p class="has-text-centered pb-6" >'.$categoria['categoria_ubicacion'].'</p>
                    ';

                    echo $insProducto->listarProductoControlador($url[2],10,$url[0],"",$url[1]);
                }else{
                    echo '
                    <p class="has-text-centered pb-6"><i class="far fa-grin-wink fa-5x"></i></p>
                    <h2 class="has-text-centered title" >Seleccione una categoría para empezar</h2>';
                }
            ?>
        </div>

    </div>
        </fieldset>
    </div>

</div>
</fieldset>
</div>