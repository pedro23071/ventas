
<div id="contenedor">
<div class="container is-fluid mb-">
	<h1 class="title" >Categorías</h1>

</div>
    <?php  include "./app/views/inc/btn_back.php"; ?>
    <fieldset><legend><h2 class="subtitle"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de categorías</h2></legend>
<div class="container pb-2 pt-2" ></div>

        <div style="    width: 1100px;
    height: 700px;
    overflow-y: auto;
    border: 1px solid #ccc;
    padding: 10px;
border: none">

            <div class="form-rest mb-6 mt-6">
                <?php
                use app\controllers\categoryController;

                $insCategoria = new categoryController();

                echo $insCategoria->listarCategoriaControlador($url[1],15,$url[0],"");
                ?>
            </div>


    <?php
    include 'navlateral.php';
    ?>
</div>
</div>
</fieldset>