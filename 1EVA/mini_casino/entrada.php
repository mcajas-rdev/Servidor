<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>casino online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="titulo">Bienvenido al Casino </h1>

    <form action="apuesta.php" method="post" class="form card">

        <div class="entrada contenido-card">
            <p class="texto-visitas">Esta es su <strong class="resaltar"><?php echo $visitas; ?></strong> visita.</p>
            <label for="cartera" class="label">Introduzca el dinero con el que va a jugar</label>
            <input type="number" name="cartera" id="cartera" onkeydown="if(event.key === 'Enter') this.form.submit();" class="input numero">
        </div>

    </form>
</body>
</html>
