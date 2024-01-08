<div class="container is-fluid">
	<h1 style="font-size: 2em" "class="title"><i class="fab fa-dashcube fa-fw"></i>&nbsp;DASHBOARD</h1>
    <p>¡Bienvenido <span style="font-weight: bold"><?php echo $_SESSION['usuario']; ?></span>! Este es el panel principal del sistema acá podrá encontrar atajos para acceder a los distintos listados de cada módulo del sistema.</p>
    <br><div class="columns is-flex is-justify-content-center">
<!--    	<figure class="image is-128x128">-->
<!--    		--><?php
//    			if(is_file("./app/views/fotos/".$_SESSION['foto'])){
//    				echo '<img class="is-rounded" src="'.APP_URL.'app/views/fotos/'.$_SESSION['foto'].'">';
//    			}else{
//    				echo '<img class="is-rounded" src="'.APP_URL.'app/views/fotos/default.png">';
//    			}
//    		?>
<!--		</figure>-->
  	</div>
  	<div class="columns is-flex is-justify-content-center">
<!--  		<h2 class="subtitle">¡Bienvenido --><?php //echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?><!--!</h2>-->
  	</div>
</div>
<?php
	$total_cajas=$insLogin->seleccionarDatos("Normal","caja","caja_id",0);

	$total_usuarios=$insLogin->seleccionarDatos("Normal","usuario WHERE usuario_id!='1' AND usuario_id!='".$_SESSION['id']."'","usuario_id",0);

	$total_clientes=$insLogin->seleccionarDatos("Normal","cliente WHERE cliente_id!='1'","cliente_id",0);

	$total_categorias=$insLogin->seleccionarDatos("Normal","categoria","categoria_id",0);

	$total_productos=$insLogin->seleccionarDatos("Normal","producto","producto_id",0);

	$total_ventas=$insLogin->seleccionarDatos("Normal","venta","venta_id",0);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <style >
            .container {
                max-width: 1200px;
                margin: 0 auto;
            }

            .box-section {
                display: flex;
                justify-content: space-around;
                margin-bottom: 10px;
            }

            .box {
                text-align: center;
                padding: 20px;
                border: 1px solid #d7d7d7;
                border-radius: 8px;
                width: 200px!important;
                height: 200px!important;
                transition: all .2s ease;
                display: flex;
                flex-direction: column;
                align-items: center;
                position: relative;
                margin-bottom: 10px;
                margin_top: 20px;
                margin-left: 20px;
            }

            .box:hover {
                border-color: #ffffff;
                background-color: #ffffff;
                color: #007bff;
            }

            .box i {
                font-size: 5em;
                margin-bottom: 10px;
                color: #455a64;
            }

            .box:hover i {
                color: #007bff;
            }

            .box p.heading {
                color: #485a64;
                margin: 0;
                font-size: 1.2em;
                font-weight: bold;
            }

            .box:hover p.heading {
                color: #007bff;
            }

            .box p.title {
                color: #455a64;
                font-size: 0.9em;
            }

            .box:hover p.title {
                color: #007bff;
            }

            /* Estilos para la barra de herramientas */
            .box:hover::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 5px;
                background-color: #007bff;
                transition: all 0.3s ease;
                border-top-left-radius: 8px;
                border-top-right-radius: 8px;
            }

            /* Estilos para el hr */
            .box hr {
                margin: 10px 0;
                border: none;
                height: 2px;
                background-image: linear-gradient(to right, transparent, #007bff, transparent);
            }
        </style>
    
    </head>
    <body>

    <div style="max-width: 1490px!important;" class="container pb-6 pt-6">

        <!-- Sección 1: Cajas -->
        <div class="box-section">
            <div class="box">
                <a href="<?php echo APP_URL; ?>cashierList/">
                    <p class="heading">Cajas</p>
                    <hr>
                    <i class="fas fa-cash-register"></i>
                    <p class="title"><?php echo $total_cajas->rowCount(); ?> Registrados</p>
                </a>
            </div>

            <div class="box">
                <a href="<?php echo APP_URL; ?>provedorList/">
                    <p class="heading">Proveedores</p>
                    <hr>
                    <i class="fas fa-shipping-fast fa-fw"></i>
                    <p class="title"><?php echo $total_clientes->rowCount(); ?> Registrados</p>
                </a>
            </div>



            <div class="box">
                <a href="<?php echo APP_URL; ?>categoryList/">
                    <p class="heading">Categorías</p>
                    <hr>
                    <i class="fas fa-suitcase-rolling"></i>
                    <p class="title"><?php echo $total_categorias->rowCount(); ?> Registrados</p>
                </a>
            </div>

            <div class="box">
                <a href="<?php echo APP_URL; ?>userList/">
                    <p class="heading">Usuarios</p>
                    <hr>
                    <i class="fas fa-user-tie fa-fw"></i>
                    <p class="title"><?php echo $total_usuarios->rowCount(); ?> Registrados</p>
                </a>
            </div>

            <div class="box">
                <a href="<?php echo APP_URL; ?>productList/">
                    <p class="heading">Productos</p>
                    <hr>
                    <i class="fas fa-boxes fa-fw"></i>
                    <p class="title"><?php echo $total_productos->rowCount(); ?> Registrados</p>
                </a>
            </div>

            <div class="box">
                <a href="<?php echo APP_URL; ?>clientList/">
                    <p class="heading">Clientes</p>
                    <hr>
                    <i class="fas fa-child fa-fw"></i>
                    <p class="title"><?php echo $total_clientes->rowCount(); ?> Registrados</p>
                </a>
            </div>

            <div class="box">
                <a href="<?php echo APP_URL; ?>movList/">
                    <p class="heading">Movimientos</p>
                    <hr>
                    <i class="fas fa-money-check-alt fa-fw"></i>
                    <p class="title"><?php echo $total_clientes->rowCount(); ?> Registrados</p>
                </a>
            </div>


        </div>

        <!-- Sección 2: Categorías, Productos, Ventas -->
        <div class="box-section">



            <div class="box">
                <a href="<?php echo APP_URL; ?>saleList/">
                    <p class="heading">Ventas</p>
                    <hr>
                    <i class="fas fa-coins fa-fw"></i>
                    <p class="title"><?php echo $total_ventas->rowCount(); ?> Registrados</p>
                </a>
            </div>

            <div class="box">
                <a href="<?php echo APP_URL; ?>cotiList/">
                    <p class="heading">Cotizaciones</p>
                    <hr>
                    <i class="fas fa-file-invoice fa-fw"></i>
                    <p class="title"><?php echo $total_categorias->rowCount(); ?> Registrados</p>
                </a>
            </div>

            <div class="box">
                <a href="<?php echo APP_URL; ?>devoList/">
                    <p class="heading">Devoluciones</p>
                    <hr>
                    <i class="fas fa-people-carry fa-fw"></i>
                    <p class="title"><?php echo $total_categorias->rowCount(); ?> Registrados</p>
                </a>
            </div>

            <div class="box">
                <a href="<?php echo APP_URL; ?>comprasList/">
                    <p class="heading">Compras</p>
                    <hr>
                    <i class="fas fa-file-invoice-dollar fa-fw"></i>
                    <p class="title"><?php echo $total_categorias->rowCount(); ?> Registrados</p>
                </a>
            </div>


            <div class="box">
                <a href="<?php echo APP_URL; ?>kardexList/">
                    <p class="heading">Kardex</p>
                    <hr>
                    <i class="fas fa-pallet fa-fw"></i>
                    <p class="title"><?php echo $total_categorias->rowCount(); ?> Registrados</p>
                </a>
            </div>


            <div class="box">
                <a href="<?php echo APP_URL; ?>reportesList/">
                    <p class="heading">Reportes</p>
                    <hr>
                    <i class="far fa-file-pdf fa-fw"></i>
                    <p class="title"><?php echo $total_categorias->rowCount(); ?> Registrados</p>
                </a>
            </div>




        </div>

    </div>
<!---->


<?php
include 'navlateral.php';
?>



    </body>
</html>


