<?php
    session_start();

    if (isset($_POST["abandonar"])) {
        require_once "final.php";
        exit;
    }

    if (!isset($_SESSION["dinero"])) {
        $_SESSION["dinero"] = (float)$_POST["cartera"];
    }

    $apuesta = isset($_POST["apuesta"]) ? (float) $_POST["apuesta"] : 0;

    if ( isset($_POST["apostar"])){
        if ($apuesta >= $_SESSION["dinero"]) {
           
            echo '<div class="mensaje mensaje-error">Error, no dispone de ' . htmlspecialchars($apuesta) . ' euros para jugar</div>';
        }else{
            if (isset($_POST["tipo"]) && $apuesta > 0) {
                $rand = mt_rand(0, 36);
                switch ($_POST["tipo"]) {
                case 'Par':
                    if ($rand % 2 === 0) {
                        echo '<div class="mensaje mensaje-exito">RESULTADO DE LA APUESTA: PAR <br> GANASTE!!</div>';
                        $_SESSION["dinero"] += $apuesta;
                    } else {
                        echo '<div class="mensaje mensaje-error">RESULTADO DE LA APUESTA: IMPAR <br> PERDISTE!!</div>';
                        $_SESSION["dinero"] -= $apuesta;
                    }
                    break;

                case 'Impar':
                    if ($rand % 2 === 1) {
                        echo '<div class="mensaje mensaje-exito">RESULTADO DE LA APUESTA: IMPAR <br> GANASTE!!</div>';
                        $_SESSION["dinero"] += $apuesta;
                    } else {
                        echo '<div class="mensaje mensaje-error">RESULTADO DE LA APUESTA: PAR <br> PERDISTE!!</div>';
                        $_SESSION["dinero"] -= $apuesta;
                    }
                    break;

                default:
                    echo '<div class="mensaje mensaje-alerta">Tipo de apuesta no válido.</div>';
                    break;
                }
            }else{
                echo '<div class="mensaje mensaje-alerta">Apuesta no válida</div>';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apuesta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="apuesta.php"  method="post" class="form card">

        <div class="disponible contenido-card">
            Dispone de <strong class="resaltar"><?php echo $_SESSION["dinero"]; ?></strong> euros para jugar
        </div>
        <div class="cantidad contenido-card">
            <label for="apuesta" class="label">Cantidad a apostar: </label>
            <input type="number" name="apuesta" id="apuesta" class="input numero">
        </div>

        <div class="tipo-apuesta contenido-card">
            <label for="tipo" class="label"> Tipo de apuesta: </label>
            <input type="radio" name="tipo" id="tipo-par" value="Par" checked> <label for="tipo-par">Par</label>
            <input type="radio" name="tipo" id="tipo-impar" value="Impar"> <label for="tipo-impar">Impar</label>
        </div>

        <div class="decision contenido-card">
            <input type="submit" name="apostar" value="Apostar cantidad" class="boton boton-principal">
            <input type="submit" name="abandonar" value="Abandonar el Casino" class="boton boton-secundario">
        </div>

    </form>
</body>
</html>
