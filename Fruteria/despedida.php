<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilo.css" rel="stylesheet" type="text/css" />
<title>LA FRUTERIA - Despedida</title>
</head>
<body>
<H1> La Frutería del siglo XXI</H1>
<div class="container">
    <div class="compra-detalle">
        <?php echo $compraRealizada; ?>
    </div>
    
    <div class="mensaje-principal">¡Muchas gracias por su pedido! Vuelva pronto 💚</div>
    
    <input type="button" name="nuevoCliente" value="NUEVO CLIENTE" onclick="location.href='index.php?nuevoCliente=1'">
</div>
</body>
</html>