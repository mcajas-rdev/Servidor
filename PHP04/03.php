<?php
    echo '<h1>Datos obtenidos del Formulario</h1>';
    if(isset($_GET['boton'])){
        foreach ($_REQUEST as $eti => $val) {
            print_r('('.$eti.', '.$val.')<br> ');
        }
    }
    
?>