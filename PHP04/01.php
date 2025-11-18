<?php

    $tusuarios = [
        'pepe' => '1234',
        "luis" => "siul",
        "admin" => "admin"
    ];

    $usuario = $_POST["nombre"];
    $claves = $_POST["clave"];

    if ( $tusuarios[$usuario] == $clave)

?>