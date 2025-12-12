<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pedidos</title>
</head>
<body>
    Bienvenido usuario: <?=$cli->nombre?>.  Has entrados <?=$cli->veces?> veces en nuestra web

	Esta es su lista de pedidos del cliente con código <?=$cli->cod_cliente?>:


    <?php

        //Recorrer la tabla $tpedidos y generar el html: <table...>



    ?>
Camisa sport
20
Pantalón sport
20
Camisa sport
25
TOTAL PEDIDOS
65


</body>
</html>