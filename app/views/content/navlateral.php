<?php
function generarOpcionesMenu(): array {
    return [
        ['title' => 'Cajas', 'link' => "../backoffice/withdrawals_de_banco_list.php", 'aria-label' => 'Cajas', 'label' => 'Cajas', 'icon' => '<i class="fas fa-money-check-alt"></i>'],
        ['title' => 'Categorias', 'link' => "../backoffice/cuentat_gasto_list.php", 'aria-label' => 'Categorias', 'label' => 'Categorias', 'icon' => '<i class="fas fa-th-list"></i>'],
        ['title' => 'Clientes', 'link' => "../backoffice/todo_a_banco_list.php", 'aria-label' => 'Clientes', 'label' => 'Clientes', 'icon' => '<i class="fas fa-user-circle"></i>'],
        ['title' => 'Productos', 'link' => "../bodega/bodega_reporte_ventas.php", 'aria-label' => 'Productos', 'label' => 'Productos', 'icon' => '<i class="fab fa-product-hunt"></i>'],
        ['title' => 'Ventas', 'link' => "../backoffice/depositar_en_editar.php", 'aria-label' => 'Ventas', 'label' => 'Ventas', 'icon' => '<i class="fas fa-barcode"></i>'],
    ];
}

function generarMenuHTML(array $opciones): string {
    $li = [];

    foreach ($opciones as $opcion) {
        $opcion['title'] = htmlentities($opcion['title']);
        $opcion['label'] = htmlentities($opcion['label']);
//        $opcion['link'] = str_starts_with($opcion['link'], "javascript:") ? $opcion['link'] : htmlentities($opcion['link']);
        $opcion['link'] = (strpos($opcion['link'], "javascript:") === 0) ? $opcion['link'] : htmlentities($opcion['link']);


        $li[] = <<<HTML
    <li>
        <a title="{$opcion['title']}" href="{$opcion['link']}" target="_self" linktype="nav" data-lid="side-nav-prueba-de-manejo" data-lpos="side-nav" data-adobe-linktype="func" role="link" aria-label="{$opcion['aria-label']}" aria-required="true">
            <span class="title-txt gcss-typography-label-4">
                <span style="font-size: 12px" class="sideText">{$opcion['label']}</span>
            </span>
            <span class="icon gcss-icon-steering-wheel">{$opcion['icon']}</span>
        </a>
    </li>
HTML;
    }

    return
        '<div id="navLateral" class="dvrd lazy-content ui-draggable side-nav-widget gcss-theme-dark close hide-side-nav medium" role="navigation" aria-label="side navigation">
        <button title="Mostrar/ocultar menú" id="toggleNav"><i class="fas fa-bars"></i></button>
        <ul style="width: fit-content; padding: 5px; border-radius: 6px; box-shadow: 0 2px 3px #eea75e; list-style-type: none; border-style: none;" class="draggable-menu">'
        . implode("", $li) .
        '</ul>
    </div>';
}

// Generar opciones de menú
$opcionesMenu = generarOpcionesMenu();

// Generar y mostrar el menú HTML
echo generarMenuHTML($opcionesMenu);
?>


<script>
    //   mostrar/ocultar el menú al hacer clic en el botón
    document.getElementById('toggleNav').addEventListener('click', function(event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del botón

        var sideNav = document.querySelector('.side-nav-widget ul');
        var isHidden = sideNav.style.display === 'none' || sideNav.style.display === '';

        sideNav.style.display = isHidden ? 'block' : 'none';
        // No ocultar el botón de cerrar cuando el menú está abierto
        document.getElementById('toggleNav').style.display = 'block';
    });
    $(document).ready(function() {
        $(".draggable-menu").draggable();
    });
</script>
<script>

</script>
<style>

    /* Estilo del botón para mostrar/ocultar el menú */
    #toggleNav {
        display: block;
        margin-bottom: 5px; /* Ajusta el espacio entre el botón y el primer elemento de la lista */
        width: fit-content;
        background-color: rgba(0, 0, 0, 0.3); /* Fondo transparente con color negro y 30% de opacidad */
        color: #fff; /* Color del texto del botón */
        border: none; /* Sin borde */
        padding: 10px; /* Ajusta el relleno del botón según sea necesario */
        cursor: pointer; /* Cambia el cursor a "mano" al pasar sobre el botón */
        outline: none; /* Elimina el contorno al hacer clic */
        border-radius: 5px; /* Borde redondeado */
        transition: background-color 0.3s ease; /* Agrega una transición suave al color de fondo */
    }
    #toggleNav i {
        margin-right: 5px; /* Ajusta el espacio entre el icono y el texto, si es necesario */
    }
    #toggleNav:hover {
        background-color: rgba(133, 23, 23, 0.5); /* Cambia el color de fondo al pasar sobre el botón */
    }
    .side-nav-widget ul {
        display: none;
    }
    sub {
        font-size: .4em;
        top: .04rem;
    }
    .side-nav-widget.small.close ul li:focus-within .inline-links,.side-nav-widget.small.close ul li:focus-within span.title-txt,.side-nav-widget.small.close ul li:hover .inline-links,.side-nav-widget.small.close ul li:hover span.title-txt,.side-nav-widget.small ul li.inline-block .inline-links,.side-nav-widget.small ul li a span.title-txt,.width-focus-small,.width-hover-small,.width-small {
        width: 150px;
    }
    .side-nav-widget.medium.close ul li:focus-within .inline-links,.side-nav-widget.medium.close ul li:focus-within span.title-txt,.side-nav-widget.medium.close ul li:hover .inline-links,.side-nav-widget.medium.close ul li:hover span.title-txt,.side-nav-widget.medium ul li.inline-block .inline-links,.side-nav-widget.medium ul li a span.title-txt,.width-focus-medium,.width-hover-medium,.width-medium {
        width: 260px;
        font-weight: normal!important;
    }
    .side-nav-widget.large.close ul li:focus-within .inline-links,.side-nav-widget.large.close ul li:focus-within span.title-txt,.side-nav-widget.large.close ul li:hover .inline-links,.side-nav-widget.large.close ul li:hover span.title-txt,.side-nav-widget.large ul li.inline-block .inline-links,.side-nav-widget.large ul li a span.title-txt,.width-focus-large,.width-hover-large,.width-large {
        width: 250px
    }
    .side-nav-widget {
        position: fixed;
        top: 59%;
        right: -8px;
        margin-top: -110px;
        z-index: 104;
        transition: .1s
    }
    /*adaptado a pantalla*/
    @media screen and (max-width: 1004px) {
        .side-nav-widget.hide-side-nav {
            display:none
        }
    }
    .side-nav-widget ul li {
        margin-bottom: 3px;
        list-style: none;
    }
    .side-nav-widget ul li a {
        text-decoration: none;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
    }
    .side-nav-widget ul li a,.side-nav-widget ul li a span.title-txt {
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }
    .side-nav-widget ul li a span.title-txt {
        font-weight: 700;
        height: 42px;
        transition: width .4s
    }
    .side-nav-widget ul li a span.title-txt .sideText {
        padding: 0 20px 0 15px;
        white-space: nowrap
    }
    .side-nav-widget ul li a span .sideText.showicon:before {
        font-size: .7142857143rem;
        line-height: 1.33;
        content: "\EB14";
        font-family: GCSS Icons;
        font-weight: 400;
        position: relative;
        left: .4285714286rem;
        line-height: unset;
        margin-right: .7142857143rem
    }
    .side-nav-widget ul li a span.icon {
        font-size: 20px;
        width: 52px;
        height: 42px;
        padding: 0 15px;
        z-index: 99;
        box-sizing: border-box
    }
    .side-nav-widget ul li.inline-block,.side-nav-widget ul li a span.icon {
        text-decoration: none;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }
    .side-nav-widget ul li.inline-block {
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap
    }
    .side-nav-widget ul li.inline-block .inline-links {
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        transition: width .4s
    }
    .side-nav-widget ul li.inline-block .inline-links a {
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        z-index: 1;
        border: none
    }
    .side-nav-widget ul li.inline-block .inline-links a .icon {
        z-index: 1;
        height: 40px
    }
    .side-nav-widget ul li.inline-block .icon {
        text-decoration: none;
        font-size: 20px;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        width: 52px;
        height: 42px;
        padding: 0 15px;
        z-index: 99;
        box-sizing: border-box
    }
    .side-nav-widget.close {
        opacity: inherit;
        font-weight: inherit;
        text-shadow: inherit
    }

    .side-nav-widget.close ul li.inline-block .inline-links,.side-nav-widget.close ul li a span.title-txt {
        width: .0001px;
        position: absolute;
        right: 52px
    }
    .gcss-theme-light.side-nav-widget li a {
        color: #000
    }

    .gcss-theme-light.side-nav-widget li a span.title-txt {
        background-color: #fff;
        border: 1px solid #d1d1d1;
        border-right: 0
    }
    .gcss-theme-light.side-nav-widget li a span.icon {
        color: #f5f0f0;
        background-color: #35363a;
        border: 1px solid #d1d1d1;
        border-left: 0
    }
    .gcss-theme-light.side-nav-widget li.inline-block .inline-links {
        background-color: #fff;
        border: 1px solid #d1d1d1;
        border-right: 0
    }
    .gcss-theme-light.side-nav-widget li.inline-block .inline-links .icon {
        color: #f5f0f0;
        background-color: #fff;
        border: none
    }
    .gcss-theme-light.side-nav-widget li.inline-block .icon {
        color: #000;
        background-color: #35363a;
        border: 1px solid #d1d1d1;
        border-left: 0
    }
    .gcss-theme-dark.side-nav-widget li a {
        color: #fff
    }
    .gcss-theme-dark.side-nav-widget li a span.title-txt {
        background-color: #35363a;
        border: 1px solid #35363a;
        border-right: 0;
        border-radius: 10px 0 0   10px;
    }
    .gcss-theme-dark.side-nav-widget li a span.icon {
        color: #f5f0f0;
        background-color: #35363a;
        border: 1px solid #f5f0f0;
        border-left: 0

    }
    .gcss-theme-dark.side-nav-widget li.inline-block .inline-links {
        background-color: #f5f0f0;
        border: 1px solid #3a9ce2;

        border-right: 0;
        border-radius: 10px 0 0 10px;
    }
    .gcss-theme-dark.side-nav-widget li.inline-block .inline-links .icon {
        color: #fff;
        background-color: #f5f0f0;
        border: 0px solid #3a9ce2;
        border-radius: 10px 0 0 10px;
    }
    .gcss-theme-dark.side-nav-widget li.inline-block .icon {
        color: #f5f0f0;
        background-color: #8dcaf5;
        border: 1px solid #3a9ce2;
        border-left: 0
    }
    .side-nav__has-zoomed-text.side-nav-widget.close ul li.inline-block:hover .inline-links,.side-nav__has-zoomed-text.side-nav-widget.close ul li:hover a span.title-txt {
        width: 10.7142857143rem
    }
    .side-nav__has-zoomed-text.side-nav-widget ul li.inline-block .inline-links a {
        margin-right: .5357142857rem
    }
</style>
